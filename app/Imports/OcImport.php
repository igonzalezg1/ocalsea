<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\TablaSaltoOc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use PHPUnit\Exception;

class OcImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param Collection $collection
     */

    public function model(array $row)
    {
        $fecha_orden = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_de_creacion']))->format('Y/m/d');
        $fecha_aprobacion = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_de_aprobacion']))->format('Y/m/d');
        return new TablaSaltoOc([
            'unidad_negocio' => $row['unidad_de_negocio'],
            'compania' => $row['compania'],
            'moneda' => $row['moneda'],
            'no_proveedor' => $row['no_proveedor'],
            'nombre_proveedor' => $row['nombre_proveedor'],
            'sitio' => $row['sitio'],
            'tienda' => $row['tienda'],
            'ubicacion_envio' => $row['ubicacion_de_envio'],
            'no_orden' => $row['no_orden'],
            'status_orden' => $row['estatus_de_orden'],
            'fecha_orden' => $fecha_orden,
            'no_linea' => $row['no_linea'],
            'articulo' => $row['articulo'],
            'descripcion' => $row['descripcion'],
            'unidad_medida' => $row['unidad_de_medida'],
            'precio_unitario' => $row['precio_unitario'],
            'cantidad' => $row['cantidad'],
            'cantidad_recibida' => $row['cantidad_recibida'],
            'total_por_linea' => $row['total_por_linea'],
            'status_linea' => $row['estatus_de_linea'],
            'status_aprobacion' => $row['estatus_de_aprobacion'],
            'fecha_aprobacion' => $fecha_aprobacion,
            'factura'=>$row['factura']
        ]);
    }

    public function rules(): array
    {
        return [
            'fecha_de_creacion'=> 'required',
            'fecha_de_necesidad'=> 'required',
            'unidad_de_negocio'=> 'required',
            'compania'=> 'required',
            'moneda'=> 'required',
            'no_proveedor'=> 'required',
            'nombre_proveedor'=> 'required',
            'sitio'=> 'required',
            'ubicacion_de_envio'=> 'required',
            'no_orden'=> 'required',
            'estatus_de_orden'=> 'required',
            'no_linea'=> 'required',
            'descripcion'=> 'required',
            'unidad_de_medida'=> 'required',
            'precio_unitario'=> 'required',
            'cantidad'=> 'required',
            'cantidad_recibida'=> 'required',
        ];
    }
}
