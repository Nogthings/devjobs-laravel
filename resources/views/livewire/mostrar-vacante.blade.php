<div class="p-5">
    <div class="mb-5">
        
    @guest
        <div class="mb-10 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar a esta vacante? <a href="{{route('register')}}" class="font-bold text-indigo-700">Obten una cuenta para aplicar a esta u otras vacantes</a>
            </p>
        </div>
    @endguest
    
        <h3 class="font-semibold text-2xl text-gray-800">
            {{$vacante->titulo}}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-5 rounded">
            <p class="text-sm font-light my-3 uppercase">Empresa: <span class="normal-case font-semibold">{{$vacante->empresa}}</span></p>
            <p class="text-sm font-light my-3 uppercase">Ultimo dia: <span class="normal-case font-semibold">{{$vacante->ultimo_dia->toFormattedDateString()}}</span></p>
            <p class="text-sm font-light my-3 uppercase">Categoria: <span class="normal-case font-semibold">{{$vacante->categoria->categoria}}</span></p>
            <p class="text-sm font-light my-3 uppercase">Salario: <span class="normal-case font-semibold">{{$vacante->salario->salario}}</span></p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/'.$vacante->imagen)}}" alt="imagen vacante">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripcion del puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @auth
    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/>
    @endcannot     
    @endauth


</div>
