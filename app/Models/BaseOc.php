<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseOc extends Model
{
    use HasFactory;

    protected $table = 'baseoc';

    protected $fillable = ['oc','remision', 'centro_costos', 'id_tienda', 'subtotal', 'factura', 'status','fecha_ingreso'];

    public function tiendas()
    {
        return $this->belongsTo('App\Models\Tiendas','id_tienda','id');
    }
}
