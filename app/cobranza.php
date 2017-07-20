<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class cobranza extends Model
{
     protected $table='Cobranza';
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

    protected $hidden=[
    'remember_token',
    ];
}
