<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = ['folio_interno', 'folio_fiscal', 'nombre', 'rfc', 'subtotal', 'iva', 'isr', 'total', 'fecha_timbrado', 'fecha_de_pago'];
}
