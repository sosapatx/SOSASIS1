<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class Cobranza1 extends Model
{
    protected $table='cobranza';
    protected $primaryKey='idCobranza';
    public $timestamps= false;

     protected $fillable=[ 
    'NContrato',
    'FechaPago',
    'HoraPago',
    'FechaLimite',
    'Recargo',
    'Periodo',
    'Anio',
    'Factura',
    'Subtotal',
    'iva',
    'Total',
    'Cancelada',
    'pagado',
    'CveConcepto',
    'caja',
    ];
    protected $guarded=[
    ];
    
}
