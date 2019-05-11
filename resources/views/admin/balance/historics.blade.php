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

        <form action="{{route('historic.search') }}" method="POST" class="form form-inline" >
        {!! csrf_field() !!} <!-- Todo formulario que usa o metodo POST precisa de um tokem para validar o envio, {!! csrf_field() !!} faz com que o token não fique visivel para o usuario  -->
            <input type="text" name="id" class="form-control" placeholder="ID" >
            <input type="date" name="date" class="form-control" >
           
           
            <select name="type" class="form-control">
            <option value="">--Selecione o tipo-- </option>
                @foreach ($types as $type )
                        <option value="{{ $type }}"> {{ $type }} </option>
                @endforeach

            </select> 
            
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
                
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
                         <td>{{$historic->id }}</td>
                         <td>{{number_format($historic->amount,2,',','.')}}</td>
                         <td>{{$historic->type($historic->type) }}</td>
                         <td>{{$historic->date }}</td>
                         <td>
                             
                             @if ($historic->user_id_transaction)
                                {{$historic->userSender->name}}
                             @endif   
                        </td>
                     </tr>
                    @empty
                    @endforelse
                </tbody>
                
            </table>
                {!! $historics->links() !!}
        
        </div>
                    
        
    
    </div>
@stop