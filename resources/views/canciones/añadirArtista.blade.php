<x-app-layout>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form class="max-w-sm mx-auto" action="{{ route('canciones.guardarArtista', $cancion)}}" method="POST">
        @csrf
        @method("put")
        <div class="mb-5">
            <label for="artista" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Artista</label>
            <select name="artista">
                @foreach ($artistas as $artista)
                    @if (!$cancion->artistas->contains($artista))
                        <option value="{{$artista->id}}">{{$artista->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-app-layout>
