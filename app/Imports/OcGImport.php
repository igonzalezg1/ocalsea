<?php

namespace App\Imports;

use App\Models\TablaSaltoOcg;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class OcGImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use RemembersChunkOffset;

    public function model(array $row)
    {
        $chunkOffset = $this->getChunkOffset();
        //$fecha = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_de_entrega_del_servicio']))->format('Y/m/d');
        return new TablaSaltoOcg([
            'anio'=>$row['ano'],
            'presupuesto'=> $row['presupuesto'],
            'no_proveedor'=>$row['numero_de_proveedor'],
            'semana'=>$row['semana'],
            'folio_remision'=>$row['folio_remision'],
            'clave'=>$row['clave'],
            'tipo'=>$row['tipo'],
            'razon_social'=>$row['razon_social_proveedor'],
            'fecha_entrega'=>$row['fecha_de_entrega_del_servicio'],
            'cantidad'=>$row['cantidad'],
            'unidad_medida'=>$row['unidad_de_medida'],
            'costo_unitario'=>$row['costo_unitario_sin_iva'],
            'costo_total_s_iva'=>$row['costo_total_sin_iva'],
            'concepto_breve'=>$row['concepto_breve_del_servicio'],
            'no_tienda'=>$row['numero_de_tienda'],
            'no_ticket'=>$row['no_ticket'],
            'nombre_tienda'=>$row['nombre_de_tienda'],
            'region_mtto'=>$row['region_mtto'],
            'coordinador_mtto'=>$row['coordinador_mtto'],
            'marca'=>$row['marca']
        ]);
    }

    public function rules(): array
    {
        return [
            'ano',
            '0.1'=>'presupuesto',
            '0.2'=>'in:numero_de_proveedor',
            '0.3'=>'in:semana',
            '0.4'=>'in:folio_remision',
            '0.5'=>'in:fecha_de_entrega_del_servicio'
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
