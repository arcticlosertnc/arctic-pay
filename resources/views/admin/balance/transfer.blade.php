@extends('adminlte::page')

@section('title', 'Nova transferencia')

@section('content_header')
    <h1>Fazer transferencia </h1>
    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>

    </ol> 
@stop

@section('content')
<div class="box">
        <div class="box-header" >
           <h3>Transferencia de saldo ( informe o destinatario )</h3>
        </div>
    
        <div class="box-body">
            @include('admin.includes.alert')
            <form method="POST" action="{{route('confirm.transfer')}}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="value" placeholder="Insira o email do destinatario" class="form-control">
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-success"> Proxima etapa </button>
                </div>
            
            </form>

        </div>
    </div>
@stop