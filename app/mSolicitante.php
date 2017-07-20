<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mSolicitante extends Model
{
    //
    protected $table='solicitante';

    protected $primaryKey='idSolicitante';

    public $timestamps=false;

    protected $fillable=[
    	'curp',
    	'nombreS',
<<<<<<< HEAD
    	'direccionS'
=======
    	'direccion'
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
    ];
}
