<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaSaltoOc extends Model
{
    use HasFactory;

    protected $table = 'tablasaltooc';

    protected $fillable = ['unidad_negocio','compania','moneda','no_proveedor','nombre_proveedor','sitio','tienda',
        'ubicacion_envio','no_orden','status_orden','fecha_orden','no_linea','articulo',
        'descripcion','unidad_medida','precio_unitario','cantidad','cantidad_recibida','total_por_linea'
        ,'status_linea','status_aprobacion','fecha_aprobacion','factura'];
}
