@extends('adminlte::page')

@section('title', 'Historico de movimentações')

@section('content_header')
    <h1>Historico de movimentações </h1>

    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Historico de movimentações</a> </li>

    </ol> 

@stop

@section('content')
    
    <div class="box">
        <div class="box-header">
                
        </div>
        <div class="box-body">
       
            <table class="table table-bordered table-hover" > 
                <thead>
                     <tr>
                         <th>#</th>
                         <th>Valor</th>
                         <th>Tipo</th>
                         <th>Data</th>
                         <th>Sender</th>
                     </tr>
                </thead>
                <tbody>
                    
                @forelse ($historics as $historic)
                     <tr>
                         <th>{{$historic->id }}</th>
                         <th>{{number_format($historic->amount,2,',','.')}}</th>
                         <th>{{$historic->type($historic->type) }}</th>
                         <th>{{$historic->date }}</th>
                         <th>{{$historic->user_id_transaction }}</th>
                     </tr>
                    @empty
                    @endforelse
                </tbody>
                
            </table>

        
        </div>
                    
        
    
    </div>
@stop