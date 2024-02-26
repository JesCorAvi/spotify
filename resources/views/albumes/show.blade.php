<x-app-layout>
    @vite('resources/css/app.css')

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
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $album->nombre }}
                    </th>
                    <td class="px-6 py-4">
                        <img src={{ asset("$album->imagen") }} class=" mr-1 inline-block align-middle rounded-full">
                    </td>
                    <td class="px-6 py-4">
                        {{ $album->tiempo() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" name="canciones">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Canciones que salen en {{ $album->nombre }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        duración
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($album->canciones()->paginate(5) as $cancion)
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
    {{ $album->canciones()->paginate(5)->links() }}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Artistas que participan en {{ $album->nombre }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($album->canciones()->with('artistas')->get()->pluck('artistas')->flatten()->unique('id') as $artista)
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
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</x-app-layout>
