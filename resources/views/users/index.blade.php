@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Usuarios')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark">Usuarios</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active">localidad</li>
    </ol>
</div>


<div class="col-lg-12">
    @if (count($errors) > 0)
    <div id="notificationError" class="alert alert-danger">
        <strong>Ocurrió un problema con tus datos de entrada</strong><br>
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
                </h3>
            </div>

            <div class="card-body">
                <!-- Body -->
                <div class="form-group row">
                    <div class="col-md-3">
                        <a href="#" class="btn btn-success form-control"> add</a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="btn btn-success form-control"> add</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">



                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>
@section('js-inferior')
@parent

@endsection
@stop