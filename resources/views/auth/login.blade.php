@extends('layouts.auth_app')
@section('title')
    Login
@endsection
@section('content')
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <img src="{{ asset('img/logotipo.png') }}" alt="logo" width="100" />
                            <br />
                            <br />
                            <h3 class="mb-5">Iniciar Sesión</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger p-0">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-outline mb-4">
                                    <input id="email" type="email" name="email" placeholder="Ingresa el correo" class="form-control"  tabindex="1"
                                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}"
                                           required/>
                                </div>
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                <div class="form-outline mb-4">
                                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                                           placeholder="Ingrese contraseña" class="form-control" name="password"
                                           tabindex="2" required />
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                    <label class="form-check-label" for="form1Example3"> Recordar contraseña </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar Sesión</button>
                            </form>
                            <a href="{{ route('password.request') }}" class="text-small">
                                Recuperar contraseña
                            </a>

                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
