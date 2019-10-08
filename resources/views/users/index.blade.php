@extends('layouts.app')
@section('css')
@parent


@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Lista de Usuarios')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark"></h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active">Usuarios Registrados</li>
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
                    Lista de Usuarios Registrados
                </h3>
            </div>

                <!-- Body -->

            @if(Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="card-body">
                @role('coordinator|super-admin')
                <div class="row justify-content-end">
                    <a href="{{ route('users.create')}}" class="btn btn-primary">Registrar un nuevo usuario</a>
            </div>
            @endrole
            <br>
            <table class="table table-striped">
                <thead>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th width="170px" class="text-center">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{ $user->id }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td>{{ $user->roles->implode('name', ',') }}</td>
                            <td>
                                <a href="{{ route ('users.show', $user->id)}}" class="btn btn-info" title="Ver"><i class="fas fa-eye"></i></a>
                                @role('coordinator|super-admin')
                                <a href="{{ route ('users.edit', $user->id)}}" class="btn btn-success" title="Editar"><i class="fas fa-edit"></i></a>
                                @endrole
                                @role('super-admin')
                                <a href="{{ route('users.destroy', $user->id)}}" onclick="return confirm('¿Desea eliminar a este usuario?')" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>

@section('js-inferior')
@parent

@endsection
@stop