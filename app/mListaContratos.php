<?php

namespace sosapatex;

use Illuminate\Database\Eloquent\Model;

class mListaCliente extends Model
{
    
    public $timestamps=false;

    protected $fillable=[
    	'nombreS',
    	'curp',
    	'noContrato',
    	'rfc',
    	'rutaC'
    	'direccion'
    ];
}
