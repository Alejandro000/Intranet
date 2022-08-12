<div wire:init="loadPolizas">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Sistema de pólizas')}}
        </h2>
    </x-slot>
    <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>

            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select class="mx-2 form-control" wire:model="cant">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    <select>
                    <span class="mr-2"> entradas</span>
                </div>
                <x-jet-input class="flex-1 mx-4 mr-2" placeholder="&#xf002;" type="search" style="font-family:Arial, FontAwesome" wire:model="search"/>
                @livewire('create-poliza')
            </div>

            @if (count($polizas))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" 
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" 
                                wire:click="order('folio')">
                                Folio
                                @if($sort == 'folio')
                                    @if ($direction=='asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipo de poliza
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ingeniero asignado
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pais
                            </th>
                            {{-- <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ciudad
                            </th> --}}
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ejecutivo asignado
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Marca
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Modelo
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SN
                            </th>
                            {{-- <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Comentarios
                            </th> --}}
                            <th scope="col" 
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" 
                                wire:click="order('fechaInicio')">
                                Fecha de inicio
                                @if($sort == 'fechaInicio')
                                    @if ($direction=='asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" 
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" 
                                wire:click="order('fechaFin')">
                                Fecha final
                                @if($sort == 'fechaFin')
                                    @if ($direction=='asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fa-solid fa-sort float-right"></i>
                                @endif
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($polizas as $item)
                            <tr class="text-left px-4">
                                <td class="px-6 py-4 ">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->folio}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->cliente}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900 text-center">
                                        {{-- {{$item->tipo}} --}}
                                        {{$item->find($item->id)->tipospoliza->tipo}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{-- {{$item->ingenieros}} --}}
                                        {{$item->find($item->id)->ingeniero->ingeniero}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{-- {{$item->paises}} --}}
                                        {{$item->find($item->id)->paise->paises}}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$poliza->ciudad}}
                                    </div>
                                </td> --}}
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{-- {{$item->agente}} --}}
                                        {{$item->find($item->id)->ejecutivo->agente}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{-- {{$item->marca}} --}}
                                        {{$item->find($item->id)->marca->marca}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->modelo}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->numeroSerie}}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$poliza->comentarios}}
                                    </div> 
                                </td>--}}
                                {{-- <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$poliza->archivo}}
                                    </div>  
                                </td> --}}
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{-- {{$poliza->fechaInicio}} --}}
                                        {{\Carbon\Carbon::parse($item->fechaInicio)->format('d/m/Y')}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                    {{-- {{$poliza->fechaFin}} --}}
                                        {{\Carbon\Carbon::parse($item->fechaFin)->format('d/m/Y')}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium flex">
                                    {{-- <livewire:edit-poliza :poliza="$poliza" :wire:key="$poliza->id"> --}}
                                    <a class="btn btn-green" wire:click="edit({{$item}})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-red ml-2" wire:click="$emit('deletePoliza',{{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($polizas->hasPages())
                    <div class="container bg-gray-100 px-6 py-3">
                        {{$polizas->links()}}
                    </div>
                @endif
            @else
                <div class="w-full px-6 py-4">
                    <p class="font-semibold text-red-600">
                        No existe el registro, favor de verificar su busqueda.                
                    </p>
                </div>
            @endif
        </x-table>
    </div>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            {{-- Editar la poliza {{$poliza->folio}} --}}
            Editar poliza
        </x-slot>
        <x-slot name="content">
            {{-- Folio de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Folio"/>
                <x-jet-input class="w-full" type="text" wire:model="poliza.folio"/>
                <x-jet-input-error for="folio"/>
            </div>
            {{-- Nombre del cliente --}}
            <div class="mb-4">
                <x-jet-label value="Cliente"/>
                <x-jet-input class="w-full" type="text" wire:model="poliza.cliente"/>
                <x-jet-input-error for="cliente"/>
            </div>
            {{-- Tipo de poliza --}}
            <div class="mb-4">
                <x-jet-label value="Tipo de poliza"/>
                <select name="tipo" class="form-control w-full" wire:model="poliza.tipospoliza_id">
                <option selected>--Tipo de poliza--</option>
                    @foreach ($tipospolizas as $tipospoliza)
                        <option value="{{$tipospoliza->id}}">{{$tipospoliza->tipo}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="tipo"/>
            </div>
            {{-- Ingeniero a cargo de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Ingeniero Asignado"/>
                <select name="ingeniero" class="form-control w-full" wire:model="poliza.ingeniero_id">
                <option selected>--Seleccione al ingeniero--</option>
                    @foreach ($ingenieros as $ingeniero)
                        <option value="{{$ingeniero->id}}">{{$ingeniero->ingeniero}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="ingeniero"/>
            </div>
            {{-- Pais donde se encuentra el equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Pais"/>
                <select name="paises" class="form-control w-full" wire:model="poliza.paise_id">
                <option selected>--Seleccione el país--</option>
                    @foreach ($paiss as $paise)
                        <option value="{{$paise->id}}">{{$paise->paises}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="paises"/>
            </div>
            {{-- Ciudad donde se encuentra el equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Ciudad"/>
                <x-jet-input class="w-full" type="text" wire:model="poliza.ciudad"/>
                <x-jet-input-error for="ciudad"/>
            </div>
            {{-- Ejecutivo que vendió la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Ejecutivo asignado"/>
                <select name="agente" class="form-control w-full" wire:model="poliza.ejecutivo_id">
                <option selected>--Seleccione al ejecutivo responsable--</option>
                    @foreach ($ejecutivos as $ejecutivo)
                        <option value="{{$ejecutivo->id}}">{{$ejecutivo->agente}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="agente"/>
            </div>
            {{-- Marca del equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Marca"/>
                <select name="marca" class="form-control w-full" wire:model="poliza.marca_id">
                <option selected>--Seleccione la marca--</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="marca"/>
            </div>
            {{-- Modelo del equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Modelo"/>
                <x-jet-input class="w-full" type="text" wire:model="poliza.modelo"/>
                <x-jet-input-error for="modelo"/>
            </div>
            {{-- Número de serie asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Número de serie"/>
                <x-jet-input class="w-full" type="text" wire:model="poliza.numeroSerie"/>
                <x-jet-input-error for="numeroSerie"/>
            </div>
            {{-- Comentarios sobre la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Comentarios"/>
                <textarea class="form-control w-full" rows="6" wire:model="poliza.comentarios"></textarea>
            </div>
            {{-- Documento adjuntado --}}
            <div class="mb-4">
                <form wire:submit.prevent="save">              
                    <x-jet-label value="Documento firmado"/>
                    <input class="w-full" type="file" wire:model="archivo" id="{{$identificador}}"/>
                    <x-jet-input-error for="archivo"/>                
                </form>
            </div>
            {{-- Mostrar previsualización del PDF --}}
            @if ($archivo)
                <iframe class="w-full" src="{{$archivo->temporaryUrl()}}"></iframe>
            @else
                <iframe class="w-full" src="{{Storage::url($poliza->pdf)}}"></iframe>                
            @endif
            {{-- Fecha inicial de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Fecha de inicio"/>
                <input class="form-control w-full" type="date" wire:model="poliza.fechaInicio"/>
                <x-jet-input-error for="fecIni"/>
                <x-jet-input class="w-full" type="datatime-local"/>
            </div>
            {{-- Fecha final de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Fecha final"/>
                <input class="form-control w-full" type="date" wire:model="poliza.fechaFin"/>
                <x-jet-input-error for="fecFin"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            {{-- Botón para cerrar el modal y eliminar lo que se ingresó --}}
            <x-jet-secondary-button class="mr-4" wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>
            {{-- Boton para guardar en la base de datos la información ingresada --}}
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('deletePoliza', polizaId => {
            //window.livewire.on('$deletePoliza', polizaId => {
                Swal.fire({
                    title: '¿Esta seguro?',
                    text: "No podra revertir esta acción",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-polizas', 'delete', polizaId);
                         Swal.fire(
                            'Eliminado',
                            'El registro de la poliza se ha eliminado',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>



{{-- INSERT INTO polizasnordata2.ejecutivos (agente) SELECT agente FROM polizasnordata3.ejecutivos;
INSERT INTO polizasnordata2.ingenieros (ingeniero) SELECT ingeniero FROM polizasnordata3.ingenieros;
INSERT INTO polizasnordata2.marcas (marca) SELECT marca FROM polizasnordata3.marcas;
INSERT INTO polizasnordata2.paises (paises) SELECT paises FROM polizasnordata3.paises;
INSERT INTO polizasnordata2.tipospolizas (tipo) SELECT tipo FROM polizasnordata3.tipospolizas --}}

{{--
    Alejandro Contreras
    Eduardo Rojas
    Jaqueline Chavez
    Jesus Cruz
    Yair Vazquez
     --}}