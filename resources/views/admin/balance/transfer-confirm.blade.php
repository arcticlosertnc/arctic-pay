@extends('adminlte::page')

@section('title', 'Confirmação de transferencia')

@section('content_header')
    <h1>Confirmação de transferencia</h1>
    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>
        <li> <a href="">Transferir</a> </li>
        <li> <a href="">Confirmar transferencia</a> </li>

    </ol> 
@stop

@section('content')
<div class="box">
        <div class="box-header" >
           <h3>Confirmar transferencia de saldo </h3>
        </div>
    
        <div class="box-body">
            @include('admin.includes.alert')

            <p><strong>Recebedor: </strong>{{ $sender->name}}</p>
            <p><strong>Saldo Atual: </strong>{{ number_format($balance->amount,2,',','.') }}</p>

            <form method="POST" action="{{route('transfer.store')}}">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{$sender->id}}">

                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor:" class="form-control">
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-success"> Proxima etapa </button>
                </div>
            
            </form>

        </div>
    </div>
@stop