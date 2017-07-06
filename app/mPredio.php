<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mPredio extends Model
{
    protected $table='predio';

    protected $primaryKey='idPredio';

    public $timestamps=false;

    protected $fillable=[
    	'curp',
    	'direccion',
    	'colonia',
    	'localidad',
    ];
}
