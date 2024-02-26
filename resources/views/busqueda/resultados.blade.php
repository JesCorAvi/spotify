<x-app-layout>
    @vite('resources/css/app.css')
    <form class="flex items-center max-w-sm mx-auto" action="{{route("busqueda.resultados")}}">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

            </div>
            <input type="text" name="input" id="input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Busque lo que desee..." required />
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </form>

    @if ($artistas->count())
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre del artista
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artistas as $artista)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $artista->nombre }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($albumes->count())
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre del album
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Portada
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Duración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albumes as $album)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $album->nombre }}
                            </th>
                            <td class="px-6 py-4">
                                <img src={{ asset("$album->imagen") }}
                                    class=" mr-1 inline-block align-middle rounded-full">
                            </td>
                            <td class="px-6 py-4">
                                {{ $album->tiempo() }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    @endif

    @if ($canciones->count())
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre de la canción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            duración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($canciones as $cancion)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $cancion->nombre }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $cancion->formatear() }}
                            </th>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if (!$canciones->count() && !$albumes->count() && !$artistas->count())
        Sin resultados
    @endif

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</x-app-layout>
