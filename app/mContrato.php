<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mContrato extends Model
{
	protected $table='contrato';

	protected $primaryKey='noContrato';

	public $timestamps=false;

	protected $fillable=[ 
<<<<<<< HEAD
=======
        'predioC',
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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
