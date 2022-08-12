<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['marca'];

    //Relación uno a muchos
    public function polizas()
    {
        return $this->hasMany('App\Models\Poliza');
    }

    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto\Proyecto');
    }
}
