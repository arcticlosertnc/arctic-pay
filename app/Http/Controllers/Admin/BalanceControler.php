<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceControler extends Controller
{
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

    public function transferStore (Request $request, User $user) 
    {


      
      
        $teste = $user->getSender($request->value);
        dd($teste);
        /*$balance = auth()->user()->balance()->firstOrCreate([]); 
        $response =  $balance ->whichdraw($request->value);


           if ($response['success'])
                return redirect()
                            ->route('admin.balance')
                            ->with('success',$response['message']);
        
    
        return redirect()
                    ->route('admin.balance')
                    ->with('error',$response['message']);  
                    */  
    }



}
