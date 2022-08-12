<?php

namespace App\Http\Livewire\Proyecto;

use Livewire\Component;
use App\Models\Proyecto\Proyecto;
use App\Models\Proyecto\Ingpreventa;
use App\Models\Proyecto\Estado;
use App\Models\Marca;
use App\Models\Ejecutivo;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ShowProyectos extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    public $proyecto, $archivo, $identificador, $agente, $integrador, $cliente, $marca, $productos, $subtotal, $estado, $comentarios, $fecCierre, $ingeniero;
    public $sort = "fechaCierre";
    public $direction = 'asc';
    public $open_edit = false;
    public $cant = '10';
    public $readyToLoad = false;

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant'=> ['except' => '5'],
        'sort'=> ['except' => 'fechaFin'],
        'direction'=> ['except' => 'asc'],
        'search'=> ['except' => '']
    ];

    public function mount()
    {
        $this->identificador = rand();
        $this->proyecto = new Proyecto();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    //Modificar la vista del edit
    protected $rules = [
        'proyecto.ejecutivo_id.*' => 'required',
        'proyecto.integrador' => 'required',
        'proyecto.clienteFinal' => 'required',
        'proyecto.marca_id.*' => 'required',
        'proyecto.productos' => 'required',        
        'proyecto.subtotal' => 'required',
        'proyecto.estado_id.*' => 'required',
        'proyecto.fechaCierre.*' => 'required',
        // 'pdf'=> 'required|max:2048',
        'proyecto.comentarios' => 'required',
        'proyecto.ingpreventa_id.*' => 'required',
        
    ];

    public function render()
    {
        if ($this->readyToLoad) {

            $proyectos = Proyecto::select('proyectos.*', 'ejecutivos.agente', 'ingpreventas.ingeniero', 'marcas.marca', 'estados.estado')
                                ->join('ejecutivos', 'proyectos.ejecutivo_id', '=', 'ejecutivos.id')
                                ->join('ingpreventas', 'proyectos.ingpreventa_id', '=', 'ingpreventas.id')
                                ->join('marcas', 'proyectos.marca_id', '=', 'marcas.id')
                                ->join('estados', 'proyectos.estado_id', '=', 'estados.id')
                                ->orWhere('agente', 'like', '%' . $this->search . '%')
                                ->orWhere('integrador', 'like', '%' . $this->search . '%')
                                ->orWhere('clienteFinal', 'like', '%' . $this->search . '%')
                                ->orWhere('marca', 'like', '%' . $this->search . '%')
                                ->orWhere('productos', 'like', '%' . $this->search . '%')
                                ->orWhere('subtotal', 'like', '%' . $this->search . '%')
                                ->orWhere('estado', 'like', '%' . $this->search . '%')
                                ->orWhere('fechaCierre', 'like', '%' . $this->search . '%')
                                ->orWhere('ingeniero', 'like', '%' . $this->search . '%')
                                ->orderBy($this->sort, $this->direction)
                                ->paginate($this->cant);
        }
        else
        {
            $proyectos = [];
        }

        $ingenieros = Ingpreventa::with('proyectos')->get();
        $marcas = Marca::with('proyectos')->get();
        $estados = Estado::with('proyectos')->get();
        $ejecutivos = Ejecutivo::with('proyectos')->get();
        return view('livewire.proyecto.show-proyectos', compact('proyectos', 'ingenieros', 'estados', 'marcas', 'ejecutivos'));
    }

    public function loadProyectos()
    {
        $this->readyToLoad = True;
    }

    public function order($sort)
    {
        if ($this->sort==$sort) {
            if ($this->direction=='desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
            
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }

    public function edit(Proyecto $proyecto)
    {
        $this->proyecto = $proyecto;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->archivo) {
            Storage::delete([$this->proyecto->pdf]);
            $this->proyecto->pdf = $this->archivo->store('public');
        }

        $this->proyecto->save();
        $this->reset(['open_edit']);
        $this->identificador = rand();
        $this->emit('alert', 'El proyecto se ha actualizado correctamente');
    }

    public function delete(Proyecto $proyecto)
    {
        $proyecto->delete();
        // Storage::delete([$proyecto->pdf]);
    }
}
