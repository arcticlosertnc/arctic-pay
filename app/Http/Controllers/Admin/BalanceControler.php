<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;
use App\Models\Historic ; 

class BalanceControler extends Controller
{
    private $totalpage = 2; 
    public function index ()
    {
        $balance = auth()->user()->balance;
        $amount  = $balance ? $balance->amount : 0 ; 
        //$amount = 0 ;
        return view('admin.balance.index', compact('amount'));
    }
    public function deposit ()
    {

        return view('admin.balance.deposit');

    }

    public function whichdraw ()
    {
        return view('admin.balance.whichdraw'); 
    }

    public function transfer ()
    {
        return view('admin.balance.transfer'); 
    }

    public function historic (Historic $historic)
    {
                            $historics = auth()
                            ->user()
                            ->historics()
                            ->with('userSender') //with usa o metodo 'userSender' do model historic
                            ->paginate($this->totalpage); //paginate faz a paginação da tabela  
        

        
                            $types = [
                                'I' => 'Entrada' , 
                                'O' => 'Saida',
                                'T' => 'Transferência',
                            ];
        return view('admin.balance.historics',compact('historics','types'));
    }
    
    public function depositStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]); 
        $response =  $balance ->deposit($request->value);


           if ($response['success'])
                return redirect()
                            ->route('admin.balance')
                            ->with('success',$response['message']);
        
    
        return redirect()
                    ->route('admin.balance')
                    ->with('error',$response['message']);
                        
    }

    public function whichdrawStore (MoneyValidationFormRequest $request) 
    {
      
        $balance = auth()->user()->balance()->firstOrCreate([]); 
        $response =  $balance ->whichdraw($request->value);


           if ($response['success'])
                return redirect()
                            ->route('admin.balance')
                            ->with('success',$response['message']);
        
    
        return redirect()
                    ->route('admin.balance')
                    ->with('error',$response['message']);    
    }

    public function confirmTransfer (Request $request, User $user) 
    {

      
        if (!$sender = $user->getSender($request->value))
        {
            return redirect()
                        ->back()
                        ->with('error','Usuario não foi encontrado!');
        }
        
        if ($sender->id === auth()->user()->id)
        {
            return redirect()
                        ->back()
                        ->with('error','Você não pode fazer transferencia para você mesmo!');
        
        }

        $balance = auth()->user()->balance; 

        return view('admin.balance.transfer-confirm',compact('sender','balance'));
        
        
    }



    public function transferStore (MoneyValidationFormRequest $request, User $user) 
    {

        
          if (!$sender =  $user->find($request->sender_id))  
          {
            return redirect()
                         ->route('balance.transfer')
                         ->with('success','Recebedor não encontrado!');
          }


        $balance = auth()->user()->balance()->firstOrCreate([]); 
        $response =  $balance ->transfer($request->value,$sender);


           if ($response['success'])
                return redirect()
                            ->route('admin.balance')
                            ->with('success',$response['message']);
        
    
        return redirect()
                    ->route('balance.transfer')
                    ->with('error',$response['message']);
      
        
    }

    public function searchHistoric(Request $request,Historic $historic)
    {
        $dataForm = $request->except('_token');
        
        $historics = $historic->search($dataForm, $this->totalpage);
        
        $types = [
            'I' => 'Entrada' , 
            'O' => 'Saida',
            'T' => 'Transferência',
        ];
        
        return view('admin.balance.historics',compact('historics','types','dataForm'));

    }

}
