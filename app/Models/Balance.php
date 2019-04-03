<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB; 

class Balance extends Model
{
    public $timestamps = false ; 


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



}

