<?php

namespace App\Models\Proyecto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['ejecutivo_id', 'integrador', 'clienteFinal', 'marca_id', 'productos', 'subtotal', 'estado_id', 'fechaCierre', 'comentarios', 'ingpreventa_id'];
    
    //Relación uno a muchos (inversa)
    public function ingpreventa()
    {
        // $user = User::find($this->user_id);
        return $this->belongsTo('App\Models\Proyecto\Ingpreventa');
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Proyecto\Estado');
    }
    
    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');
    }


    public function ejecutivo()
    {
        return $this->belongsTo('App\Models\Ejecutivo');
    }
}
