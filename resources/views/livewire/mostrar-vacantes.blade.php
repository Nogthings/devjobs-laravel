<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="space-y-3">
                <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-semibold">
                    {{$vacante->titulo}}
                </a>
                <div class="md:flex justify-between">
                    <p class="text-sm font-semibold text-gray-600">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Ultimo dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-stretch md:justify-end mt-2 gap-3">
                <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    {{$vacante->candidatos->count()}} Candidatos
                </a>
                <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Editar
                </a>
                <button wire:click="$emit('mostrarAlerta',{{$vacante->id}})" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Eliminar
                </button>
            </div>
         </div>   
         @empty
         
         <div class="p-6 bg-white">
            <p class="text-sm uppercase text-center">No hay vacantes</p>
         </div>
      
        @endforelse
    
    </div>
    
    <div class="flex justify-center mt-10">
        {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', vacanteId=>{
                Swal.fire({
                    title: '¿Eliminar la vacante?',
                    text: "No puedes deshacer esta accion.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //eliminar la vacante desde el servidor
                Livewire.emit('eliminarVacante', vacanteId)

                Swal.fire(
                'Se elimino la vacante',
                'Eliminado correctamente',
                'success'
                )
            }
            })
        })

    </script>
@endpush