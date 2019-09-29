<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
      </button>
      
<!-- Modal -->
<div class="modal fade" id="mostrarUsuario{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="Mostrar Usuario" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Información del Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <table class="table table-striped">
                            <tr>
                                <td><h3>Usuario</h3></td>
                            </tr>
                            <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                            </tr>
                            <tr>
                                <td><p>Nombre: <b>{{$user->name}}</b></p></td>
                                <td><p>Correo Electronico: <b>{{$user->email}}</b></p></td>
                                <td><p>Fecha de creación: <b>{{$user->created_at}}</b></p></td>
                                <td><p>Última actualización: <b>{{$user->->updated_at}}</b></p></td>
                            </tr>
                        </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      *****--****


      @extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Visualizacion de Usuario')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark"></h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
        <li class="breadcrumb-item active">Visualización de Usuario</li>
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
                    Visualización de Usuario
                </h3>
            </div>

                <!-- Body -->
                <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-center">Mostrar Usuario</h2>
                        </div>
                        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Details:</strong>
                                {{ $user->email }}
                            </div>
                        </div>
                    </div>
                @endsection
                        </div>
        </div>
    </div>
</div>

@endsection

@section('js-inferior')
@parent

@endsection
@stop