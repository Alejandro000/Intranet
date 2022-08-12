<?php

namespace App\Http\Livewire\Proyecto;

use Livewire\Component;
use App\Models\Proyecto\Proyecto;
use App\Models\Proyecto\Ingpreventa;
use App\Models\Proyecto\Estado;
use App\Models\Marca;
use App\Models\Ejecutivo;

use Livewire\WithFileUploads;

class CreateProyecto extends Component
{
    use WithFileUploads;

    public $open = false;
    public $archivo, $identificador, $agente, $integrador, $cliente, $marca, $productos, $subtotal, $estado, $comentarios, $fecCierre, $ingeniero;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'agente' => 'required',
        'integrador' => 'required',
        'cliente' => 'required',
        'marca' => 'required',
        'productos' => 'required',
        'subtotal' => 'required|numeric',
        'estado' => 'required',
        'comentarios' => 'required',
        'fecCierre' => 'required',
        'ingeniero' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);   
    }

    public function save()
    {
        $this->validate();
        // $nameFile = $this->folio. '.' .$this->archivo->getClientOriginalExtension();
        // $archivos = $this->archivo->storeAs('archivos', $nameFile, 'public_uploads');
        // $archivos = $this->archivo->storeAs('public',$nameFile);
        Proyecto::create([
            'ejecutivo_id' => $this->agente,
            'integrador' => $this->integrador,
            'clienteFinal' => $this->cliente,
            'marca_id' => $this->marca,
            'productos' => $this->productos,
            'subtotal' => $this->subtotal,
            'estado_id' => $this->estado,
            'fechaCierre' => $this->fecCierre,
            'comentarios' => $this->comentarios,
            'ingpreventa_id' => $this->ingeniero,
        ]);
        $this->reset(['open', 'agente', 'integrador', 'cliente', 'productos', 'subtotal', 'estado', 'marca', 'comentarios', 'archivo', 'fecCierre']);
        $this->identificador = rand();
        $this->emitTo('proyecto.show-proyectos','render');
        $this->emit('alert', 'El proyecto se ha guardado correctamente');
    }

    public function default()
    {   
        $this->reset(['agente', 'integrador', 'cliente', 'productos', 'subtotal', 'estado', 'marca', 'comentarios', 'archivo', 'fecCierre']);
    }

    public function render()
    {
        $proyectos = Proyecto::latest('id')->get();  //principal, paginación de datos
        $ingenieros = Ingpreventa::with('proyectos')->get();
        $marcas = Marca::with('proyectos')->get();
        $estados = Estado::with('proyectos')->get();
        $ejecutivos = Ejecutivo::with('proyectos')->get();
        return view('livewire.proyecto.create-proyecto', compact('proyectos', 'ingenieros', 'marcas', 'estados', 'ejecutivos'));
    }
}
