@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Editar rol {{ $role->name }}</h3>
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Favor de revisar los campos</strong>
                                    @foreach($errors->all() as $error)
                                        <span class="text-white">{{ $error }}</span>
                                        <br/>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::model($role, ['method'=>'PATCH','route'=>['roles.update', $role->id]])!!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del rol:</label>
                                        <input type="text" id="name" value="{{ $role->name }}" name="name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Permisos para este rol:</label>
                                        <br />
                                        @foreach($permission as $permission)
                                            <label>{{ Form::checkbox('permission[]',$permission->id, in_array($permission->id, $rolePermissions)) }} {{ $permission->name }}</label>
                                            <br />
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-info w-100"><i class="fas fa-user-plus"></i>
                                        Editar rol
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
