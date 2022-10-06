<?php

namespace App\Http\Controllers;

use App\Models\BaseOcF;
use App\Models\Tiendas;
use Illuminate\Http\Request;

class EditarRegistrosController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:editar-registrooc',['only'=>['editaroc']]);
    }

    public function editaroc(Request $request)
    {
        $validated = $request->validate([
            'centro_costos'=>'exists:App\Models\Tiendas,numero_tienda',
            'remision' => 'required',
            'factura' => 'required',
            'status'=>'required'
        ]);
        $datos = $request->all();
        $registro = BaseOcF::find($datos['id']);
        $tienda = Tiendas::where('numero_tienda',$datos['centro_costos'])->first();
        $registro->update([
            'remision'=>$datos['remision'],
            'centro_costos'=>$datos['centro_costos'],
            'id_tienda'=>$tienda->id,
            'factura'=>$datos['factura'],
            'status'=>$datos['status'],
        ]);

        return back()->with('editarocok', $registro->oc);
    }
}
