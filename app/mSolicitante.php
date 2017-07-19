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
    	'CURP',
    	'nombreS',
    	'direccionS'
    ];
}
