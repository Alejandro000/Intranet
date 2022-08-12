<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
    use HasFactory;
    protected $fillable = ['agente'];

    //Relación uno a muchos
    // public function lugares()
    // {
    //     return $this->hasMany('App\Models\Lugare');
    // }
    public function polizas()
    {
        return $this->hasMany('App\Models\Poliza');
    }

    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto\Proyecto');
    }
}
