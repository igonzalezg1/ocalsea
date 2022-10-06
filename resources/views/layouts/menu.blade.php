<li class="menu-header">Dashboard</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link btn btn-light botones" href="{{ asset('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
@can('ver-user')
    <li class="menu-header">Informacion de usuarios</li>
@endcan
<li class="side-menus">
    @can('ver-user')
        <a class="nav-link btn btn-light botones" href="{{ route('usuarios.index') }}">
            <i class="fas fa-users"></i><span>Administrar usuarios</span>
        </a>
    @endcan
    @can('ver-rol')
        <a class="nav-link btn btn-light botones" href="{{ route('roles.index') }}">
            <i class="fas fa-user-tag"></i><span>Administrar roles</span>
        </a>
    @endcan
</li>
<li class="menu-header">Subir archivos excel</li>
<li class="side-menus">
    @can('subir-oc')
        <a class="nav-link btn btn-light botones" href="{{ route('subiroc') }}">
            <i class="fas fa-upload"></i><span>Subir ordenes de compra</span>
        </a>
    @endcan
    <a class="nav-link btn btn-light botones" href="{{ route('vistaPagos') }}">
        <i class="fas fa-folder"></i><span>Subir pagos (facturas)</span>
    </a>
    <!-- Subir CAPEX DESABILITADO
    <a class="nav-link btn btn-light botones" href="#">
        <i class="fas fa-file-upload"></i><span>Subir CAPEX</span>
    </a>
    -->
    <a class="nav-link btn btn-light botones" href="{{ route('vistaocg') }}">
        <i class="fas fa-file-import"></i><span>Subir archivo general de carga</span>
    </a>
</li>
<li class="menu-header">Ver reportes</li>
<li class="side-menus">
    @can('ver-reporte')
        <a class="nav-link btn btn-light botones" href="{{ route('verreporteoc') }}">
            <i class="fas fa-file-excel"></i><span>Ver reporte de OC</span>
        </a>
    @endcan
    <a class="nav-link btn btn-light botones" href="{{ route('verReportePagos') }}">
        <i class="fas fa-money-check-alt"></i><span>Ver facturas (pagos)</span>
    </a>
    <a class="nav-link btn btn-light botones" href="{{ route('verReportesOcg') }}">
        <i class="fas fa-database"></i><span>Ver datos generales de carga</span>
    </a>
    <a class="nav-link btn btn-light botones" href="{{ route('verReporteAclaraciones') }}">
        <i class="fas fa-head-side-cough"></i><span>Ver reporte de acalaraciones</span>
    </a>
</li>
<li class="menu-header">Opciones extras</li>
<li class="side-menus">
    <a class="nav-link btn btn-light botones" href="{{ route('tiendas.index') }}">
        <i class="fas fa-store"></i><span>Administrar tiendas</span>
    </a>
</li>
