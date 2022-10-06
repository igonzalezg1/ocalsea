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
                            <h3 class="text-center">Roles</h3>
                            @can('crear-rol')
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg w-100"><i
                                        class="fas fa-unlock-alt"></i> Nuevo
                                    rol</a>
                            @endcan
                            <br/>
                            <br/>
                            <table id="tablageneral" class="display" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Nombre del rol</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('editar-rol')
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info"><i
                                                        class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('borrar-rol')
                                                    {!! Form::open(['method'=>'DELETE', 'route'=>['roles.destroy', $role->id],'style'=>'display:inline']) !!}
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
