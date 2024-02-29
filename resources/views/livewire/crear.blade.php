<div>
    @vite('resources/css/app.css')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div  class="max-w-sm mx-auto" >
        @csrf
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
            <input type="nombre" wire:model="nombreA" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>

        <div class="mb-5">
            <label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duracion en segundos</label>
            <input type="duracion" wire:model="duracionA" id="duracion"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-5">
            <label for="artista" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Artistas</label>
                @foreach ($artistas as $artista)
                    <input wire:model="artistasA[{{$artista->id}}]" type="checkbox">{{$artista->nombre}}</input><br>
                @endforeach
        </div>
        <div class="mb-5">
            <label for="album" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Albumes</label>
                @foreach ($albumes as $album)
                <input wire:model="albumesA[{{$album->id}}]" type="checkbox">{{$album->nombre}}</input><br>
                @endforeach
        </div>
        <button wire:click="crear()"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</div>
