@extends('layouts.app')

@section('content')
    @php
        use App\Models\BaseOcg;
        use App\Models\Pagos;
        use App\Models\BaseOcF;
        $totalocg = BaseOcg::count();
        $totalpagos = Pagos::count();
        $totaloc = BaseOcF::count();
    @endphp
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h5 class="text-center">Ordenes generales en el sistema</h5>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="text-center"><i class="fas fa-money-check"></i>
                                                <span>{{ $totalocg }}</span></h4>
                                            <p class="m-b-0 text-right"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h5 class="text-center">Facturas registradas en el sistema</h5>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="text-center"><i class="fas fa-money-check-alt"></i>
                                                <span>{{ $totalpagos }}</span></h4>
                                            <p class="m-b-0 text-right"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h5 class="text-center">Ordenes de compra registradas</h5>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="text-center">
                                                <i class="fas fa-file-excel"></i><span> {{ $totaloc }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

