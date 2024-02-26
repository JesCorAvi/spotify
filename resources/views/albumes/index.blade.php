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
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albumes as $album)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$album->nombre}}
                    </th>
                    <td class="px-6 py-4">
                        <img src={{ asset("$album->imagen") }} class=" mr-1 inline-block align-middle rounded-full">
                    </td>
                    <td class="px-6 py-4">
                       {{$album->tiempo()}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route("albumes.edit", $album)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a><br>
                        <form action="{{route("albumes.destroy", $album)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                <a href="{{route("albumes.create")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Crear</a>

            </tbody>
        </table>
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</x-app-layout>
