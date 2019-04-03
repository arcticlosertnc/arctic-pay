@extends('adminlte::page')

@section('title', 'Nova Retirada')

@section('content_header')
    <h1>Fazer Retirada</h1>
    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>

    </ol> 
@stop

@section('content')
<div class="box">
        <div class="box-header" >
           
        </div>
    
        <div class="box-body">
            @include('admin.includes.alert')
            <form method="POST" action="{{route('whichdraw.store')}}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor Recarga" class="form-control">
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-danger"> Saque </button>
                </div>
            
            </form>

        </div>
    </div>
@stop