@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Crear un usuario</h3>
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Favor de revisar los campos</strong>
                                    @foreach($errors->all() as $error)
                                        <span class="text-white">{{ $error }}</span>
                                        <br />
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::open(array('route'=>'usuarios.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="first_name">Nombre(s):</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Apellidos:</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Genero:</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="hombre" selected>Masculino</option>
                                            <option value="mujer">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo:</label>
                                        <input type="email" id="email" name="email" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Telefono:</label>
                                        <input type="number" id="phone" name="phone" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Telefono celular:</label>
                                        <input type="number" id="mobile" name="mobile" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Nombre de usuario:</label>
                                        <input type="text" id="username" name="username" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña:</label>
                                        <input type="password" id="password" name="password" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Contraseña:</label>
                                        <input type="password" id="confirm-password" name="confirm-password"
                                               class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_empresa">Empresa:</label>
                                        {!! Form::select ('id_empresa', $empresas->pluck('nombre','id')->all(), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Roles</label>
                                        {!! Form::select('roles[]', $roles,[],array('class'=>'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" selected>Activo</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-info w-100"><i class="fas fa-user-plus"></i> Agregar
                                        usuario
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
