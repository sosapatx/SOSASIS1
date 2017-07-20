<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mRuta extends Model
{
<<<<<<< HEAD
    protected $table='Rutas';

    protected $primaryKey='nRuta';
=======
    protected $table='ruta';

    protected $primaryKey='noRuta';
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337

    public $timestamps=false;

    protected $fillable=[
    	//'noRuta',
<<<<<<< HEAD
    	'Calle',
    	'Colonia'
=======
    	'calle',
    	'colonia'
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
    ];
}
