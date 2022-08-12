<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Ingeniero;
use App\Models\Tipospoliza;
use App\Models\Paise;
use App\Models\Poliza;
use App\Models\Marca;
use App\Models\Ejecutivo;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ShowPolizas extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    public $poliza, $archivo, $identificador, $folio, $cliente, $tipo, $ingeniero, $paises, $ciudad, $agente, $marca, $modelo, $numeroSerie, $comentarios, $fecIni, $fecFin;
    public $sort = "fechaFin";
    public $direction = 'asc';
    public $open_edit = false;
    public $cant = '5';
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
        $this->poliza = new Poliza();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    protected $rules = [
        'poliza.folio' => 'required|numeric',
        'poliza.ingeniero_id.*' => 'required',
        'poliza.tipospoliza_id.*' => 'required',
        'poliza.cliente' => 'required',
        'poliza.paise_id.*' => 'required',
        'poliza.ciudad' => 'required',
        'poliza.ejecutivo_id.*' => 'required',
        'poliza.marca_id.*' => 'required',
        'poliza.modelo' => 'required',
        'poliza.numeroSerie' => 'required',
        // 'pdf'=> 'required|max:2048',
        'poliza.comentarios' => 'required',
        'poliza.fechaInicio.*' => 'required',
        'poliza.fechaFin.*' => 'required',
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            
            $polizas = Poliza::select('polizas.*', 'ejecutivos.agente', 'ingenieros.ingeniero', 'marcas.marca', 'paises.paises', 'tipospolizas.tipo')
                            ->join('ejecutivos', 'polizas.ejecutivo_id', '=', 'ejecutivos.id')
                            ->join('ingenieros', 'polizas.ingeniero_id', '=', 'ingenieros.id')
                            ->join('marcas', 'polizas.marca_id', '=', 'marcas.id')
                            ->join('paises', 'polizas.paise_id', '=', 'paises.id')
                            ->join('tipospolizas', 'polizas.tipospoliza_id', '=', 'tipospolizas.id')
                            ->orWhere('folio', 'like', '%' . $this->search . '%')
                            ->orWhere('cliente', 'like', '%' . $this->search . '%')
                            ->orWhere('tipo', 'like', '%' . $this->search . '%')
                            ->orWhere('ingeniero', 'like', '%' . $this->search . '%')
                            ->orWhere('paises', 'like', '%' . $this->search . '%')
                            ->orWhere('agente', 'like', '%' . $this->search . '%')
                            ->orWhere('marca', 'like', '%' . $this->search . '%')
                            ->orWhere('modelo', 'like', '%' . $this->search . '%')
                            ->orWhere('numeroSerie', 'like', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);
        }
        else
        {
            $polizas = [];
        }
        $ingenieros = Ingeniero::with('polizas')->get();
        $tipospolizas = Tipospoliza::with('polizas')->get();
        $marcas = Marca::with('polizas')->get();
        $paiss = Paise::with('polizas')->get();
        $ejecutivos = Ejecutivo::with('polizas')->get();
        return view('livewire.show-polizas', compact('polizas', 'ingenieros', 'tipospolizas', 'marcas', 'paiss', 'ejecutivos'));        
    }

    public function loadPolizas()
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

    public function edit(Poliza $poliza)
    {
        $this->poliza = $poliza;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->archivo) {
            Storage::delete([$this->poliza->pdf]);
            $this->poliza->pdf = $this->archivo->store('public');
        }

        $this->poliza->save();
        $this->reset(['open_edit', 'archivo']);
        $this->identificador = rand();
        $this->emit('alert', 'La poliza se ha actualizado correctamente');
    }

    public function delete(Poliza $poliza)
    {
        $poliza->delete();
        Storage::delete([$poliza->pdf]);
    }
}