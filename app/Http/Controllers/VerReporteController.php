<?php

namespace App\Http\Controllers;

use App\Models\BaseOcF;
use App\Models\BaseOcg;
use App\Models\Pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-reporte',['only'=>['vistaOC']]);
    }

    public function verReportes()
    {
        $oc = BaseOcF::with('pagos')->with('tiendas')->get();
        return view('reportes.reporteoc', compact('oc'));
    }

    public function verReportesOcg()
    {
        $ocg = BaseOcg::all();
        return view('reportes.reportesocg', compact('ocg'));
    }

    public function verReportePagos()
    {
        $pagos = Pagos::all(['folio_interno','folio_fiscal','nombre','rfc','subtotal','iva','isr','total','fecha_timbrado','fecha_de_pago']);
        return view('reportes.reportespagos',compact('pagos'));
    }

    public function verReporteAclaraciones()
    {
        $query = BaseOcg::whereNotIn('folio_remision', (BaseOcF::select('remision')->get()))->get();
        return view('reportes.reporteaclaraciones', compact('query'));
    }
}
