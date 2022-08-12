<?php

namespace App\Models\Proyecto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingpreventa extends Model
{
    use HasFactory;

    protected $fillable = ['ingeniero'];

    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto\Proyecto');
    }
}
