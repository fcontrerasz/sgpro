<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'perfil';
    public $timestamps = false;
    protected $primaryKey = 'idperfil';
    public function users()
	{
	//dd('llegue aca');
    return $this
        ->belongsToMany('App\User')
        ->withTimestamps();
	}
}
