<x-app-layout>

    @vite('resources/css/app.css')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form class="max-w-sm mx-auto" action="{{ route('canciones.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
            <input type="nombre" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>

        <div class="mb-5">
            <label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duracion en segundos</label>
            <input type="duracion" name="duracion" id="duracion"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-5">
            <label for="artista" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Artista</label>
            <select name="artista">
                @foreach ($artistas as $artista)
                    <option value="{{$artista->id}}">{{$artista->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="album" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album</label>
            <select name="album">
                @foreach ($albumes as $album)
                <option value="{{$album->id}}">{{$album->nombre}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-app-layout>
