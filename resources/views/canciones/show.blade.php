<x-app-layout>
    @vite('resources/css/app.css')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre de la cancion
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Duración
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cancion->nombre}}
                    </th>

                    <td class="px-6 py-4">
                       {{$cancion->formatear()}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Albumes en los que aparece {{$cancion->nombre}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Portada del album
                    </th>
                    <th scope="col" class="px-6 py-3">
                        duración total
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($cancion->albumes as $album)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $album->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            <img src={{ asset("$album->imagen") }} class=" mr-1 inline-block align-middle rounded-full">
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $album->tiempo() }}
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Artistas que participan en {{$cancion->nombre}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancion->artistas as $artista)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$artista->nombre}}
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</x-app-layout>
