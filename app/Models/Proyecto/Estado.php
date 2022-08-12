<?php

namespace App\Models\Proyecto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = ['estado'];

    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto\Proyecto');
    }
}
