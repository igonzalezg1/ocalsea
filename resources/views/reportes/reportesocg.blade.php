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
                            <h3 class="text-center">Reporte general de carga</h3>
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
                                    <th>Año</th>
                                    <th>Presupuesto</th>
                                    <th>No. Proveedor</th>
                                    <th>Semana</th>
                                    <th>Folio de remision</th>
                                    <th>Clave</th>
                                    <th>Tipo</th>
                                    <th>Razon social</th>
                                    <th>Fecha de entrega</th>
                                    <th>Cantidad</th>
                                    <th>Unidad de medida</th>
                                    <th>Costo unitario sin IVA</th>
                                    <th>Costo total sin IVA</th>
                                    <th>Concepto breve</th>
                                    <th>No. de tienda</th>
                                    <th>No. Ticket</th>
                                    <th>Nombre de tienda</th>
                                    <th>Region MTTO.</th>
                                    <th>Coordinador MTTO.</th>
                                    <th>Marca</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ocg as $oc)
                                    <tr>
                                        <td>{{ $oc->anio }}</td>
                                        <td>{{ $oc->presupuesto }}</td>
                                        <td>{{ $oc->no_proveedor }}</td>
                                        <td>{{ $oc->semana }}</td>
                                        <td>{{ $oc->folio_remision }}</td>
                                        <td>{{ $oc->clave }}</td>
                                        <td>{{ $oc->tipo }}</td>
                                        <td>{{ $oc->razon_social }}</td>
                                        <td>{{ $oc->fecha_entrega }}</td>
                                        <td>{{ $oc->cantidad }}</td>
                                        <td>{{ $oc->unidad_medida }}</td>
                                        <td>{{ $oc->costo_unitario }}</td>
                                        <td>{{ $oc->costo_total_s_iva }}</td>
                                        <td>{{ $oc->concepto_breve }}</td>
                                        <td>{{ $oc->no_tienda }}</td>
                                        <td>{{ $oc->no_ticket }}</td>
                                        <td>{{ $oc->nombre_tienda }}</td>
                                        <td>{{ $oc->region_mtto }}</td>
                                        <td>{{ $oc->coordinador_mtto }}</td>
                                        <td>{{ $oc->marca }}</td>
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
