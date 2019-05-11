<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User ;

class Historic extends Model
{
    protected $fillable = ['type','amount', 'total_before','total_after', 'user_id_transaction','date'];

    public function getDateAttribute($value) //função para formatar a data 
        {

                return  Carbon::parse($value)->format('d/m/Y'); 

        }

    public function type ($type=null)
    {
        $types = [
            'I' => 'Entrada' , 
            'O' => 'Saida',
            'T' => 'Transferência',
        ];
        if (!$types)
            return $types ; 
        
        if ($this->user_id_transaction != null && $type =='I')
                return 'Recebido' ; 
       
      return $types[$type];      
    }
    
    public function user()
    {
        return $this ->belongsTo(User::class); 
    }

    public function userSender()
    {
        return $this ->belongsTo(User::class,'user_id_transaction' ); 
    }


    public function search(Array $data, $totalPage)
    { 
             $test = $this->where(function($query) use ($data) {

                            if (isset($data['id'])) 
                                        $query->where('id',$data['id']);
                            
                            if (isset($data['id'])) 
                                        $query->where('id',$data['id']);

                            if (isset($data['id'])) 
                                        $query->where('id',$data['id']);
            
            })->toSql();
            dd($test);
            //->paginate($totalPage);
    }




}


