<?php

namespace App\Http\Controllers;

use App\Imports\OcGImport;
use App\Imports\PagosImport;
use App\Models\BaseOc;
use App\Models\BaseOcF;
use App\Models\BaseOcg;
use App\Models\Pagos;
use App\Models\TablaSaltoOc;
use App\Models\TablaSaltoOcg;
use App\Models\TablaSaltoPagos;
use Illuminate\Http\Request;
use App\Imports\OcImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Exception;

class SubirArchivosController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subir-oc', ['only' => ['vistaOC']]);
        $this->middleware('permission:subir-ocg', ['only' => ['vistaOCG']]);
    }


    //Subir archivos de OC
    public function vistaOC()
    {
        return view('subirexcel.ordenescompra');
    }

    public function vistaPagos()
    {
        return view('subirexcel.pagos');
    }

    public function importDatos(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx,csv',
        ]);
        Excel::import(new OcImport, $request->file('excel'));

        $this->compararDatos();

        return back()->with('exceloc', 'Se subio correctamente');
    }


    public function compararDatos()
    {
        $query = "SELECT MAX(oc) AS oc,MAX(remision) AS remision,MAX(centro_costos) AS centro_costos,MAX(id_tienda) AS id_tienda,SUM(subtotal) AS subtotal,MAX(factura) AS factura,MAX(status) AS status,MAX(fecha_ingreso) AS fecha_ingreso FROM baseoc
                    GROUP BY oc
                    ORDER BY oc ASC;
                    ";
        $query = DB::select($query);
        foreach ($query as $item) {
            $datos = BaseOcF::where('oc', $item->oc)->first();
            if (empty($datos)) {
                BaseOcF::create([
                    'oc' => $item->oc,
                    'remision' => $item->remision,
                    'centro_costos' => $item->centro_costos,
                    'id_tienda' => $item->id_tienda,
                    'subtotal' => $item->subtotal,
                    'factura' => $item->factura,
                    'status' => $item->status,
                    'fecha_ingreso' => $item->fecha_ingreso
                ]);
            } else {
                $datos->factura = $item->factura;
                $datos->status = $item->status;
                $datos->save();
            }
        }
        BaseOc::query()->delete();
    }

    //Subir archivos de archivos general de carga
    public function vistaocg()
    {
        return view('subirexcel.archivogeneralcarga');
    }

    public function enviarexcelocg(Request $request)
    {
        $request->validate([
            'excelocg' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new OcGImport, $request->file('excelocg'));

        $this->agruparocf();
        return back()->with('exceloc', 'Se subio correctamente');
    }


    public function agruparocf()
    {
        $query = "SELECT MAX(anio) AS anio, MAX(presupuesto) AS presupuesto, MAX(no_proveedor) AS no_proveedor, MAX(semana) AS semana, MAX(folio_remision) AS folio_remision, MAX(clave) AS clave, MAX(tipo) AS tipo, MAX(razon_social) AS razon_social, MAX(fecha_entrega) AS fecha_entrega, MAX(cantidad) AS cantidad, MAX(unidad_medida) AS unidad_medida, SUM(costo_unitario) AS costo_unitario,
                SUM(costo_total_s_iva) AS costo_total_s_iva, MAX(concepto_breve) AS concepto_breve, MAX(no_tienda) AS no_tienda, MAX(no_ticket) AS no_ticket, MAX(nombre_tienda) AS nombre_tienda, MAX(region_mtto) AS region_mtto, MAX(coordinador_mtto) AS coordinador_mtto, MAX(marca) AS marca FROM tablasaltoocg
                GROUP BY folio_remision ORDER BY folio_remision ASC";

        $query = DB::select($query);

        foreach ($query as $item) {
            $datos = BaseOcg::select('folio_remision')->where('folio_remision', $item->folio_remision)->first();
            if (empty($datos)) {
                BaseOcg::create([
                    'anio' => $item->anio,
                    'presupuesto' => $item->presupuesto,
                    'no_proveedor' => $item->no_proveedor,
                    'semana' => $item->semana,
                    'folio_remision' => $item->folio_remision,
                    'clave' => $item->clave,
                    'tipo' => $item->tipo,
                    'razon_social' => $item->razon_social,
                    'fecha_entrega' => $item->fecha_entrega,
                    'cantidad' => $item->cantidad,
                    'unidad_medida' => $item->unidad_medida,
                    'costo_unitario' => $item->costo_unitario,
                    'costo_total_s_iva' => $item->costo_total_s_iva,
                    'concepto_breve' => $item->concepto_breve,
                    'no_tienda' => $item->no_tienda,
                    'no_ticket' => $item->no_ticket,
                    'nombre_tienda' => $item->nombre_tienda,
                    'region_mtto' => $item->region_mtto,
                    'coordinador_mtto' => $item->coordinador_mtto,
                    'marca' => $item->marca
                ]);
            }
        }
        TablaSaltoOcg::query()->delete();
    }

    public function enviarexcelpagos(Request $request)
    {
        $request->validate([
            'excelpagos' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new PagosImport, $request->file('excelpagos'));

        $this->agregarpagos();
        return back()->with('exceloc', 'Se subio correctamente');
    }

    public function agregarpagos()
    {
        $pagos = TablaSaltoPagos::all();
        foreach ($pagos as $pago) {
            $item = Pagos::select('nombre')->where('folio_fiscal', $pago->folio_fiscal)->first();
            if (empty($item)) {
                Pagos::create([
                    'folio_interno' => $pago->folio_interno,
                    'folio_fiscal' => $pago->folio_fiscal,
                    'nombre' => $pago->nombre,
                    'rfc' => $pago->rfc,
                    'subtotal' => $pago->subtotal,
                    'iva' => $pago->iva,
                    'isr' => $pago->isr,
                    'total' => $pago->total,
                    'fecha_timbrado' => $pago->fecha_timbrado,
                    'fecha_de_pago' => $pago->fecha_de_pago
                ]);
            }
        }
        TablaSaltoPagos::query()->delete();
    }
}
