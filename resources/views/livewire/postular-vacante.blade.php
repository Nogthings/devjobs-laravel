<div class="flex flex-col justify-center items-center p-5 mt-10 bg-gray-50">
    <h3 class="text-center text-xl font-semibold my-4">Postulate a la vacante</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-900 font-bold p-2 my-3 rounded">
            {{session('mensaje')}}
        </div>
        @else

        <form action="" class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum (PDF)')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" accept=".pdf"/>
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>
    
            <x-primary-button>
                postularme
            </x-primary-button>
        </form>
    @endif

</div>
