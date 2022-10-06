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
                            <h3 class="text-center">Usuarios</h3>
                            @can('crear-user')
                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-lg w-100"><i
                                        class="fas fa-user-plus"></i> Nuevo
                                    usuario</a>
                            @endcan
                            <br/>
                            <br/>
                            <table id="tablageneral" class="display" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Celular</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->first_name }}</td>
                                        <td>{{ $usuario->last_name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->phone }}</td>
                                        <td>{{ $usuario->mobile }}</td>
                                        <td>
                                            @if(!empty($usuario->getRoleNames()))
                                                @foreach($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-primary">{{ $rolName }}</span></h5>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('editar-user')
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info"><i
                                                        class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('borrar-user')
                                                    {!! Form::open(['method'=>'DELETE', 'route'=>['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                    {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
