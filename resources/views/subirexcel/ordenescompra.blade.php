@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Subir excel</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Subir ordenes de compra (OC)</h3>
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Favor de subir un archivo excel o revisar los campos del subido</strong>
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
                            <form action="{{ route('enviarexcel') }}" method="POST" class="formulario-oc" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="excel"><h3>Selecciona el archivo excel a subir.</h3></label>
                                    <br />
                                    <input type="file" name="excel" id="excel" class="upload-box">
                                </div>
                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-file-excel"></i> Subir excel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
