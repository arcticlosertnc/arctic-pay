@extends('site.layouts.app')

@section('title','Meu Perfil')

@section('content')
<h1>Meu Perfil </h1>

@if(session('success'))

    <div class="alert alert-success">
        {{session('success')}}
    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger">
        {{session('error')}}
    </div>

@endif





<form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
    {!!csrf_field()!!}
    <div class="form-goup">
        <label for="name">Nome</label>
        <input type="text" value="{{auth()->user()->name}}" class ='form-control' name="name" placeholder="Nome">
    </div>
    
    <div class="form-goup">
        <label for="email">E-mail</label>
        <input type="email"class ='form-control' value="{{auth()->user()->email}}" name="email" placeholder="E-mail">
    </div>
    
    <div class="form-goup">
        <label for="password">Senha </label>
        <input type="password" class ='form-control'  name="password" placeholder="Senha">
    </div>
    
    <div class="form-goup">
        <label for="image">Imagem</label>
        <input type="file" class ='form-control' name="image">
    </div>
    <br>
    <div class="form-goup">
        <button type="submit" class="btn btn-info" >Atualiza perfil</button>
    </div>


</form>

@endsection