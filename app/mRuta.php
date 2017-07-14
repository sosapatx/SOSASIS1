<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mRuta extends Model
{
    protected $table='Rutas';

    protected $primaryKey='nRuta';

    public $timestamps=false;

    protected $fillable=[
    	//'noRuta',
    	'calle',
    	'colonia'
    ];
}
