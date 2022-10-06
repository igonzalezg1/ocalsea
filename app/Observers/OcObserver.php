<?php

namespace App\Observers;

use App\Models\BaseOc;
use App\Models\TablaSaltoOc;
use App\Models\Tiendas;

class OcObserver
{
    /**
     * Handle the TablaSaltoOc "created" event.
     *
     * @param  \App\Models\TablaSaltoOc  $tablaSaltoOc
     * @return void
     */
    public function created(TablaSaltoOc $tablaSaltoOc)
    {
        $remision = '';
        $array = explode("-",$tablaSaltoOc->descripcion);
        foreach ($array as $arr)
        {
            if (str_contains($arr, 'FAC'))
            {
                $remision = substr($arr,4);
            }
        }
        $centroco = filter_var(end($array),FILTER_SANITIZE_NUMBER_INT);
        $tienda = Tiendas::where('numero_tienda', $centroco)->first();
        if (empty($tienda))
        {
            $centroco = 'S/Centro de costos';
            $idtienda = 345;
        }else
        {
            $idtienda = $tienda->id;
        }
        BaseOc::create([
            'oc'=>$tablaSaltoOc->no_orden,
            'remision'=>$remision,
            'centro_costos'=>$centroco,
            'id_tienda'=>$idtienda,
            'subtotal'=>$tablaSaltoOc->total_por_linea,
            'factura'=>$tablaSaltoOc->factura,
            'status'=>$tablaSaltoOc->status_orden ,
            'fecha_ingreso'=>$tablaSaltoOc->fecha_orden,
        ]);
    }

    /**
     * Handle the TablaSaltoOc "updated" event.
     *
     * @param  \App\Models\TablaSaltoOc  $tablaSaltoOc
     * @return void
     */
    public function updated(TablaSaltoOc $tablaSaltoOc)
    {
        //
    }

    /**
     * Handle the TablaSaltoOc "deleted" event.
     *
     * @param  \App\Models\TablaSaltoOc  $tablaSaltoOc
     * @return void
     */
    public function deleted(TablaSaltoOc $tablaSaltoOc)
    {
        //
    }

    /**
     * Handle the TablaSaltoOc "restored" event.
     *
     * @param  \App\Models\TablaSaltoOc  $tablaSaltoOc
     * @return void
     */
    public function restored(TablaSaltoOc $tablaSaltoOc)
    {
        //
    }

    /**
     * Handle the TablaSaltoOc "force deleted" event.
     *
     * @param  \App\Models\TablaSaltoOc  $tablaSaltoOc
     * @return void
     */
    public function forceDeleted(TablaSaltoOc $tablaSaltoOc)
    {
        //
    }
}
