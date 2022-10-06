@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tiendas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Tiendas</h3>
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Favor de revisar los siguientes campos:</strong>
                                    <br />
                                    @foreach($errors->all() as $error)
                                        <span class="text-white">{{ $error }}</span>
                                        <br/>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <button type="button" data-toggle="modal" data-target="#tiendasCreate"
                                    class="btn btn-primary w-100"><i class="fas fa-store"></i> Nueva
                                tienda
                            </button>
                            <br/>
                            <br/>
                            <table id="tablageneral" class="display" style="width: 100%">
                                <thead class="encabezadotabla">
                                <tr>
                                    <th>No. de tienda</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tiendas as $tienda)
                                    <tr>
                                        <td>{{ $tienda->numero_tienda }}</td>
                                        <td>{{ $tienda->nombre }}</td>
                                        <td>{{ $tienda->marca }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#tiendasEdit"
                                                    data-id="{{ $tienda->id }}"
                                                    data-numero="{{ $tienda->numero_tienda }}"
                                                    data-nombre="{{ $tienda->nombre }}"
                                                    data-marca="{{ $tienda->marca }}"
                                                    class="btn btn-primary btntiendasedit"><i
                                                    class="fas fa-edit"></i></button>

                                            {!! Form::open(['method'=>'DELETE', 'route'=>['tiendas.destroy', $tienda->id],'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash-alt"></i></button>
                                            {!! Form::close() !!}
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


    <div class="modal fade" id="tiendasCreate" tabindex="-1" role="dialog" aria-labelledby="exampleMoldalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Crear una tienda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('creartienda') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="no_tienda">Numero de tienda:</label>
                            <input type="text" name="no_tienda" id="no_tienda" class="form-control"/>
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"/>
                            <label for="marca">Marca</label>
                            <input type="text" name="marca" id="marca" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Guardar tienda</button>
                        <br/>
                        <br/>
                        <button type="button" class="btn btn-danger w-100" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
                b
            </div>
        </div>
    </div>


    <div class="modal fade" id="tiendasEdit" tabindex="-1" role="dialog" aria-labelledby="exampleMoldalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Editar información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::model($tienda, [
                                'method' => 'PATCH',
                                'route' => ['tiendas.update', $tienda->id],
                            ]) !!}
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="idtienda" id="idtienda" />
                        <label for="no_tienda">Numero de tienda:</label>
                        <input type="text" name="no_tienda" id="no_tiendae" class="form-control"/>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombree" class="form-control"/>
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marcae" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Guardar tienda</button>
                    <br/>
                    <br/>
                    <button type="button" class="btn btn-danger w-100" data-dismiss="modal">Cancelar</button>
                    {!! Form::close() !!}
                </div>
                b
            </div>
        </div>
    </div>
@endsection
