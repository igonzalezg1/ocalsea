@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Reportes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!--Loader -->
                            <h3 class="text-center">Ordenes de compra</h3>
                            <br />
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Revise los campos! </strong>
                                    <br />
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                        <br />
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <br/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary" id="daterange-btn">
                                        <i class="far fa-calendar-alt"></i> <span>Selecciona la fecha</span> <i
                                            class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                            </div>
                            <br/>
                            <table id="DataTable" class="display" style="width: 100%">
                                <thead class="encabezadotabla">
                                <tr>
                                    <th>Orden de compra</th>
                                    <th>Remision</th>
                                    <th>Centro de costos</th>
                                    <th>Tienda</th>
                                    <th>Marca</th>
                                    <th>Subtotal</th>
                                    <th>Factura folio interno</th>
                                    <th>Folio fiscal</th>
                                    <th>Fecha ingreso</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oc as $oc)
                                    <tr>
                                        <td>{{ $oc->oc }}</td>
                                        @if(empty($oc->remision))
                                            <td>CAPEX</td>
                                        @else
                                            <td>{{ $oc->remision }}</td>
                                        @endif
                                        <td>{{ $oc->centro_costos }}</td>
                                        <td>{{ $oc->tiendas->nombre }}</td>
                                        <td>{{ $oc->tiendas->marca }}</td>
                                        <td>${{ $oc->subtotal }}</td>
                                        <td>{{ $oc->factura }}</td>
                                        @if(empty($oc->pagos->folio_fiscal))
                                            <td>S/FOLIO FISCAL</td>
                                        @else
                                            <td>{{ $oc->pagos->folio_fiscal }}</td>
                                        @endif
                                        <td>{{ $oc->fecha_ingreso }}</td>
                                        <td>{{ $oc->status }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btninformacion"
                                                    data-toggle="modal" data-target="#modalupdate"
                                                    data-id="{{ $oc->id }}"
                                                    data-oc="{{ $oc->oc }}" data-remision="{{ $oc->remision }}"
                                                    data-centrocostos="{{ $oc->centro_costos }}"
                                                    data-factura="{{ $oc->factura }}" data-status="{{ $oc->status }}"><i
                                                    class="fas fa-edit"></i></button>
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


    <div class="modal fade" id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleMoldalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Editar información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="editaroc" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                            <label for="oc">Orden de compra:</label>
                            <input type="text" name="oc" id="oc" class="form-control" disabled/>
                            <label for="remision">Remision</label>
                            <input type="text" name="remision" id="remision" class="form-control" />
                            <label for="centro-costos">Centro de costos</label>
                            <input type="text" name="centro_costos" id="centro_costos" class="form-control">
                            <label for="factura">Factura</label>
                            <input type="text" name="factura" id="factura" class="form-control">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="ABIERTO">ABIERTO</option>
                                <option value="CANCELADO">CANCELADO</option>
                                <option value="CERRADO">CERRADO</option>
                                <option value="CERRADO PARA RECIBIR">CERRADO PARA RECIBIR</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info w-100">Guardar cambios</button>
                        <br />
                        <br />
                        <button type="button" class="btn btn-danger w-100" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
