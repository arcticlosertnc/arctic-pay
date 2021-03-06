<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User; 

class Balance extends Model
{
    public $timestamps = false ; 


    public function whichdraw (float $value )
    {
        if ($this->amount < $value)
            {
                return [
                    'success' => false , 
                    'message' => 'Falha ao retirar saldo insuficiente'
                ];
            }

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0 ; 
        
        $this->amount -=  number_format($value,2,'.','');
        
        $whichdraw =  $this->save();
        
         $historic = auth()->user()->historics()->create ([
         
            'type' => 'O',
            'amount' => $value,
            'total_before'=> $totalBefore,
            'total_after'=> $this->amount,
            'date' => date('Ymd')
        ]);

        if ($whichdraw && $historic)

            {
                DB::commit();
            
            return [
                'success' => true , 
                'message' => 'Sucesso ao retirar'
            ];

            }    
        else 
        {
            DB::roollback();
            return [
                'success' => false , 
                'message' => 'Falha ao retirar'
            ];
        }
        
    }


    public function deposit (float $value)
    {

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0 ; 
        
        $this->amount +=  number_format($value,2,'.','');
        
        $depoist =  $this->save();
        
         $historic = auth()->user()->historics()->create ([
         
            'type' => 'I',
            'amount' => $value,
            'total_before'=> $totalBefore,
            'total_after'=> $this->amount,
            'date' => date('Ymd')
        ]);

        if ($depoist && $historic)

            {
                DB::commit();
            
            return [
                'success' => true , 
                'message' => 'Sucesso ao recarregar'
            ];

            }    
        else 
        {
            DB::roollback();
            return [
                'success' => false , 
                'message' => 'Falha ao carregar'
            ];
        }
        
        
            
    }

    public function transfer (float $value , User $sender)  

        {
         if ($this->amount < $value)
            {
                return [
                    'success' => false , 
                    'message' => 'Falha ao retirar saldo insuficiente'
                ];
            }

        DB::beginTransaction();
        /**************************************************************************
         * Atualiza o proprio saldo 
         **************************************************************************/
        $totalBefore = $this->amount ? $this->amount : 0 ; 
        $this->amount -=  number_format($value,2,'.','');
        $transfer =  $this->save();
        $historic = auth()->user()->historics()->create ([
         
            'type' => 'T',
            'amount' => $value,
            'total_before'=> $totalBefore,
            'total_after'=> $this->amount,
            'date' => date('Ymd'),
            'user_id_transaction'   => $sender->id,
        ]);   


        /**************************************************************************
         * Atualiza o saldo do recebedor
         **************************************************************************/
        $senderBalance = $sender->balance()->firstOrCreate([]); // firstOrCreate usado para se o destinatorio nunca tiver feito uma recarga na conta     
        $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount  : 0 ; 
        $senderBalance->amount +=  number_format($value,2,'.','');
        $transferSender =  $senderBalance->save();
        
         $historicSender = $sender->historics()->create ([
            
            
            'type'                  => 'I',
            'amount'                => $value,
            'total_before'          => $totalBeforeSender,
            'total_after'           => $senderBalance->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => auth()->user()->id,  
        ]);

        if ($transferSender && $historicSender && $historic && $transfer)

            {
                DB::commit();
            
            return [
                'success' => true , 
                'message' => 'Sucesso ao transferir'
            ];

            }    
        else 
        {
            DB::roollback();
            return [
                'success' => false , 
                'message' => 'Falha ao transferir'
            ];
        }
        }


}

