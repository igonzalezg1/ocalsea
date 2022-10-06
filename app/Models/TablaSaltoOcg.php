<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaSaltoOcg extends Model
{
    use HasFactory;

    protected $table = 'tablasaltoocg';

    protected $fillable = ['anio', 'presupuesto', 'no_proveedor', 'semana', 'folio_remision', 'clave', 'tipo', 'razon_social', 'fecha_entrega', 'cantidad', 'unidad_medida', 'costo_unitario', 'costo_total_s_iva', 'concepto_breve', 'no_tienda', 'no_ticket', 'nombre_tienda', 'region_mtto', 'coordinador_mtto', 'marca'];
}
