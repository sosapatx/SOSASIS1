<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mPredio extends Model
{
    protected $table='predio';

    protected $primaryKey='IdPredio';

    public $timestamps=false;

    protected $fillable=[
    	'CURP',
    	'Direccion',
    	'Colonia',
    	'Localidad',
    ];
}
