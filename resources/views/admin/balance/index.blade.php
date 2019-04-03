@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>

    </ol> 

@stop

@section('content')
    
    <div class="box">
        <div class="box-header">
                    
                <a href="{{ route('balance.deposit') }}" class ="btn btn-primary"><i class="fa fa-arrow-circle-right"></i></i> Recarga</a>
                <a href="" class ="btn btn-danger" ><i class="fa fa-arrow-circle-left"></i>     Saque</a>
        </div>
        <div class="box-body">
              
                <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>R$ {{number_format($amount , 2 ,'.', '')}}</h3>

                        <p>Saldo do usuario</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                    
        
    
    </div>
@stop