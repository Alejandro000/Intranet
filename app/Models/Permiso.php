<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

        //Relación muchos a muchos
        public function role()
        {
            return $this -> belongsToMany('App\Models\Role');
        }
}
