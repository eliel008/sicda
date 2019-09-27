@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Editar usuario')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark"></h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
        <li class="breadcrumb-item active">Editar Usuarios</li>
    </ol>
</div>


<div class="col-lg-12">
    @if (count($errors) > 0)
    <div id="notificationError" class="alert alert-danger">
        <strong>Ocurri?? un problema con tus datos de entrada</strong><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('message.nivel'))

    <div class="alert alert-{{ session('message.nivel') }} alert-dismissible" role="alert">
        <div class="m-alert__icon">
            <i class="fa fa-{{ session('message.icon') }}"></i>
        </div>
        <div class="m-alert__text">
            <strong>
                {{ session('message.title') }}
            </strong>
            {{ session('message.content') }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
    @endif
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default color-palette-box">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-tag"></i>
                    <!-- Title -->
                    'Editar usuario: ' . $user->name
                </h3>
            </div>

            <div class="card-body">
                <!-- Body -->
                
                {!!Form::open(['route' => ['users.update', $user], 'method' => 'PUT'])!!}
                {{csrf_field()}}

                <div class="form-group">
                        {!!Form::label('name', 'Nombre del Usuario:') !!}
                        {!!Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Inserte el nombre del usuario aquí', 'required'])!!}
                </div>

                <div class="form-group">
                        {!!Form::label('email', 'Correo Electronico:') !!}
                        {!!Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Ejemplo@gmail.com', 'required'])!!}
                </div>
                
          
<!--Cuando hay un Admin / User
                <div class="form-group">
                        {!!Form::label('type', 'Tipo de Usuario:') !!}
                        {!!Form::select('type', ['' => 'Seleccione un nivel','usuario' => 'Usuario', 'admin' => 'Administrador'], null, ['class' => 'form-control'])!!}
                </div>
</div> -->
                 <div class="form-group">
                        {!!Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
                </div> <a href="{{ route('users.index')}}" class="btn btn-danger">Regresar</a>

            </div>
        </div>
    </div>
</div>
@section('js-inferior')
@parent

@endsection
@stop