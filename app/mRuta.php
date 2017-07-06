<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mRuta extends Model
{
    protected $table='ruta';

    protected $primaryKey='noRuta';

    public $timestamps=false;

    protected $fillable=[
    	//'noRuta',
    	'calle',
    	'colonia'
    ];
}
