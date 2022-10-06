<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Ordenes de compra Multiserle</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Icono de la apicacion -->
    <link rel="shortcut icon" href="{{ asset('img/iconoapp.png') }}">
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('DataTables/DataTables-1.12.1/css/jquery.dataTables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/Buttons-2.2.3/css/buttons.dataTables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DateTime-1.1.2/css/dataTables.dateTime.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('DataTables/Responsive-2.3.0/css/responsive.dataTables.css') }}"/>

    <!-- Mis estilos propios -->
    <link rel="stylesheet" href="{{ asset('css/miestilo.css') }}">

    @yield('page_css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    @yield('page_css')

    @yield('css')
    @laravelPWA
</head>
<body>
<div class="text-center" id="contenedor_carga">
    <div class="spinner-border text-primary" style="width: 10rem; height: 10rem; " role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <h3>Cargando informacion...</h3>
    <p>(Los reportes pueden tardar un poco)</p>
</div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar encabezaado">
            @include('layouts.header')
        </nav>
        <div class="main-sidebar main-sidebar-postion">
            @include('layouts.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('layouts.footer')
        </footer>
    </div>
</div>

@include('profile.change_password')
@include('profile.edit_profile')

</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<!-- Script de Sweet alert 2 -->
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<!-- Scripts de Datatables -->
<script type="text/javascript" src="{{ asset('DataTables/JSZip-2.5.0/jszip.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/pdfmake-0.1.36/pdfmake.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/DataTables-1.12.1/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/Buttons-2.2.3/js/dataTables.buttons.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/Buttons-2.2.3/js/buttons.colVis.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/Buttons-2.2.3/js/buttons.html5.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/Buttons-2.2.3/js/buttons.print.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/DateTime-1.1.2/js/dataTables.dateTime.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/Responsive-2.3.0/js/dataTables.responsive.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}" />
<script type="text/javascript" src="{{ asset('js/misjs.js') }}"></script>

@yield('page_js')
@yield('scripts')
<script>
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    const userUrl = '{{url('users')}}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
<!--Funcion de mijs.js -->
@if(session('exceloc'))
    <script>mostraroc();</script>
@endif
@if(session('editarocok'))
    <script>mostrareditaroc({{ session('editarocok') }});</script>
@endif
@if(session('tiendacreada'))
    <script>tiendacreada({{ session('tiendacreada') }});</script>
@endif
@if(session('tiendaeditada'))
    <script>tiendaeditada({{ session('tiendaeditada') }});</script>
@endif
@if(session('tiendaeliminada'))
    <script>tiendaeliminada();</script>
@endif
<script>
    window.addEventListener("load", function() {
        console.log("Entra");
        var contenedorcarga = document.getElementById('contenedor_carga');
        contenedorcarga.style.visibility = 'hidden';
        contenedorcarga.style.opacity = '0';
    });
</script>
</html>
