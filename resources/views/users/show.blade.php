<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-6 margin-tb">
            <div class="pull-left">
                <h2>Informacion del usuario</h2>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $user->name}}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Correo:</strong>
                {{ $user->email}}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Contraseña:</strong>
                {{ $user->password}}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Piso:</strong>
                {{ $user->piso_id}}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}">Volver</a>
        </div>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <div class="pull-right">
                <button class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
</div>