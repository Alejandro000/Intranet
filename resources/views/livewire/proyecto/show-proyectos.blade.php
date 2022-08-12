<div wire:init="loadProyectos">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Listado de Proyectos')}}
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
                @livewire('proyecto.create-proyecto')
            </div>

            @if (count($proyectos))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" 
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" 
                                wire:click="order('agente')">
                                Agente
                                @if($sort == 'agente')
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
                                Integrador
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente final
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Marca
                            </th>
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Productos
                            </th>
                            <th scope="col" 
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('subtotal')">
                                Subtotal
                                @if($sort == 'subtotal')
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
                                Status
                            </th>
                            <th scope="col" 
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" 
                                wire:click="order('fechaCierre')">
                                Fecha de cierre
                                @if($sort == 'fechaCierre')
                                    @if ($direction=='asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            {{-- <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Comentarios
                            </th> --}}
                            <th scope="col" 
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ingeniero Preventa
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($proyectos as $item)
                            <tr class="text-left px-4">
                                <td class="px-6 py-4 ">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->find($item->id)->ejecutivo->agente}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->integrador}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900 text-center">
                                        {{$item->clienteFinal}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->find($item->id)->marca->marca}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->productos}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">                     	
                                        &#36;{{$item->subtotal}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">   
                                        {{$item->find($item->id)->estado->estado}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{\Carbon\Carbon::parse($item->fechaCierre)->format('d/m/Y')}}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->comentarios}}
                                    </div>
                                </td> --}}
                                <td class="px-6 py-4">
                                    <div class="tex-sm text-gray-900">
                                        {{$item->find($item->id)->ingpreventa->ingeniero}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium flex">
                                    <a class="btn btn-green" wire:click="edit({{$item}})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-red ml-2" wire:click="$emit('deleteProyecto',{{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($proyectos->hasPages())
                    <div class="container bg-gray-100 px-6 py-3">
                        {{$proyectos->links()}}
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
            Editar proyecto
        </x-slot>
        <x-slot name="content">
            {{-- Ejecutivo Asignado --}}
            <div class="mb-4">
                <x-jet-label value="Ejecutivo asignado"/>
                <select name="agente" class="form-control w-full" wire:model="proyecto.ejecutivo_id">
                <option selected>--Seleccione al ejecutivo responsable--</option>
                    @foreach ($ejecutivos as $ejecutivo)
                        <option value="{{$ejecutivo->id}}">{{$ejecutivo->agente}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="agente"/>
            </div>
            {{-- Integrador del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Integrador"/>
                <x-jet-input class="w-full" type="text" wire:model="proyecto.integrador"/>
                <x-jet-input-error for="cliente"/>
            </div>
            {{-- Nombre del cliente --}}
            <div class="mb-4">
                <x-jet-label value="Cliente"/>
                <x-jet-input class="w-full" type="text" wire:model="proyecto.clienteFinal"/>
                <x-jet-input-error for="cliente"/>
            </div>
            {{-- Marca manejada en el proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Marca"/>
                <select name="marca" class="form-control w-full" wire:model="proyecto.marca_id">
                <option selected>--Seleccione la marca--</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="marca"/>
            </div>
            {{-- Productos en el proyecto--}}
            <div class="mb-4">
                <x-jet-label value="Productos"/>
                <x-jet-input class="w-full" type="text" wire:model="proyecto.productos"/>
                <x-jet-input-error for="cliente"/>
            </div>
            {{-- Subtotal del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Subtotal"/>
                <x-jet-input class="w-full" type="text" wire:model="proyecto.subtotal"/>
                <x-jet-input-error for="subtotal"/>
            </div>
            {{-- Status del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Status del proyecto"/>
                <select name="estado" class="form-control w-full" wire:model="proyecto.estado_id">
                <option selected>--Seleccione el estado del proyecto--</option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->estado}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="estado"/>
            </div>
            {{-- Fecha de cierre del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Fecha de cierre"/>
                <input class="form-control w-full" type="date" wire:model="proyecto.fechaCierre"/>
                <x-jet-input-error for="fechaCierre"/>
            </div>
            {{-- Comentarios sobre el proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Comentarios"/>
                <textarea class="form-control w-full" rows="6" wire:model="proyecto.comentarios"></textarea>
            </div>
            {{-- Ingeniero de preventa asignado al proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Ingeniero preventa asignado"/>
                <select name="ingpreventa" class="form-control w-full" wire:model="proyecto.ingpreventa_id">
                <option selected>--Seleccione al ingeniero--</option>
                    @foreach ($ingenieros as $ingeniero)
                        <option value="{{$ingeniero->id}}">{{$ingeniero->ingeniero}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="estado"/>
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
            Livewire.on('deleteProyecto', proyectoId => {
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
                        Livewire.emitTo('proyecto.show-proyectos', 'delete', proyectoId);
                         Swal.fire(
                            'Eliminado',
                            'El registro del proyecto se ha eliminado',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>