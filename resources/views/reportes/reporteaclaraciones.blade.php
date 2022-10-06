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
                            <h3 class="text-center">Reporte de aclaraciones</h3>
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
                                    <th>Razon social</th>
                                    <th>Folio de remision interno</th>
                                    <th>Centro de costos</th>
                                    <th>Nombre de la tienda</th>
                                    <th>Marca</th>
                                    <th>Region Mantto</th>
                                    <th>Total sin IVA</th>
                                    <th>Comentario proveedor</th>
                                    <th>Fecha de entrega al cooridnador</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($query as $oc)
                                    <tr>
                                        <td>{{ $oc->razon_social }}</td>
                                        <td>{{ $oc->folio_remision }}</td>
                                        <td>{{ $oc->no_tienda }}</td>
                                        <td>{{ $oc->nombre_tienda }}</td>
                                        <td>{{ $oc->marca }}</td>
                                        <td>{{ $oc->region_mtto }}</td>
                                        <td>${{ $oc->costo_total_s_iva }}</td>
                                        <td></td>
                                        <td>{{ $oc->fecha_entrega }}</td>
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
