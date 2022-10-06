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
                            <h3 class="text-center">Pagos (Facturas)</h3>
                            <br/>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Revise los campos! </strong>
                                    <br/>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                        <br/>
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
                                    <th>Folio interno</th>
                                    <th>Folio fiscal</th>
                                    <th>nombre</th>
                                    <th>RFC</th>
                                    <th>subtotal</th>
                                    <th>IVA</th>
                                    <th>ISR</th>
                                    <th>Total</th>
                                    <th>Fecha de pago</th>
                                    <th>Fecha de timbrado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pagos as $pago)
                                    <tr>
                                        <td>{{ $pago->folio_interno }}</td>
                                        <td>{{ $pago->folio_fiscal }}</td>
                                        <td>{{ $pago->nombre }}</td>
                                        <td>{{ $pago->rfc }}</td>
                                        <td>{{ $pago->subtotal }}</td>
                                        <td>{{ $pago->iva }}</td>
                                        <td>{{ $pago->isr }}</td>
                                        <td>{{ $pago->total }}</td>
                                        <td>{{ $pago->fecha_de_pago }}</td>
                                        <td>{{ $pago->fecha_timbrado }}</td>
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
