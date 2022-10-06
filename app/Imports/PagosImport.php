<?php

namespace App\Imports;

use App\Models\TablaSaltoPagos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;

class PagosImport implements ToModel, WithValidation,WithBatchInserts,WithHeadingRow,WithChunkReading
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
        $fecha_pago = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_de_pago']))->format('Y/m/d');
        $folio_interno = $row['serie'].$row['folio'];
        return new TablaSaltoPagos([
            'folio_interno'=>$folio_interno,
            'folio_fiscal'=>$row['folio_fiscal'],
            'nombre'=>$row['nombre'],
            'rfc'=>$row['rfc'],
            'subtotal'=>$row['subtotal'],
            'iva'=>$row['iva'],
            'isr'=>$row['isr'],
            'total'=>$row['total'],
            'fecha_timbrado'=>$row['fecha_timbrado'],
            'fecha_de_pago'=>$fecha_pago
        ]);
    }

    public function rules(): array
    {
        return ['folio_fiscal'=>'required',
            'nombre'=>'required',
            'rfc'=>'required',
            'subtotal'=>'required',
            'iva'=>'required',
            'isr'=>'required',
            'total'=>'required',
            'fecha_timbrado'=>'required',
            'fecha_de_pago'=>'required'];
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
