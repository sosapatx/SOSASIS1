<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mContrato extends Model
{
	protected $table='Contratos';

	protected $primaryKey='NContrato';

	public $timestamps=false;

	protected $fillable=[ 
        'CURP',
        'IdPredio',
        'nRuta',
        'Descuento',
        'NMedidor',
        'Marca',
        'DiametroToma',
        'TipoToma',
        'EdoToma',
        'Clasificacion',
        'FechaContrato',
        'Longuitud',
        'Latitud',
        'clave_TA'
    ];
}
