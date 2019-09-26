@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Guia')
@section('cabecera')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agrega un nuevo usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Disculpe.</strong> Hubo algunos problemas con la información suministrada. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('users.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usuario:</strong>
                <input type="text" name="user" class="form-control" placeholder="Usuario">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Correo:</strong>
                <textarea class="form-control" style="height:150px" name="correo" placeholder="Correo"></textarea>
            </div>
            <div class="form-group">
                <strong>Contraseña:</strong>
                <input type="password" class="form-control" style="height:150px" name="contraseña" placeholder="Contraseña">
            </div> 
            

            /** echo Form::password('password', ['class' => 'awesome']); 

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Suministrar</button>
        </div>
    </div>
   
</form>
@endsection