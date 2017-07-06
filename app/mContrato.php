<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mContrato extends Model
{
	protected $table='contrato';

	protected $primaryKey='noContrato';

	public $timestamps=false;

	protected $fillable=[ 
        'curpC',
        'rutaC',
        'descuento',
        'noMedidor',
        'marca',
        'diametroToma',
        'tipoToma',
        'edoToma',
        'clasificacion',
        'fechaContrato',
        'longuitud',
        'latitud'
    ];
}
