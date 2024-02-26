
<x-app-layout>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form class="max-w-sm mx-auto" action="{{ route('canciones.guardarAlbum', $cancion)}}" method="POST">
        @csrf
        @method("put")
        <div class="mb-5">
            <label for="album" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album</label>
            <select name="album">
                @foreach ($albumes as $album)
                    @if (!$cancion->albumes->contains($album))
                        <option value="{{$album->id}}">{{$album->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-app-layout>

