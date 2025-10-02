<x-layout>
    <x-slot:heading>
        Gestión de Expedientes
    </x-slot:heading>
    <div class="flex gap-x-4 p-2">
{{--         <div class="w-1/2 bg-blue-200 p-4">
            <label for="provincia" class="block text-sm font-medium text-gray-700">Por provincia</label>
            <select id="provincia" name="provincia" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                @foreach($provincias as $provincia)
                    <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                @endforeach
            </select>
        </div> --}}
        
{{-- Select para filtrar por provincia --}}
        <div class="w-1/2 bg-blue-200 p-4">
            <label for="filtro_provincia" class="block text-gray-700 text-sm font-bold mb-2">Filtrar por Provincia:</label>
            <select id="filtro_provincia" onchange="aplicarFiltroProvincia(this.value)"
                    class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Todas las Provincias</option>
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->id }}"
                            {{ request('provincia_id') == $provincia->id ? 'selected' : '' }}>
                        {{ $provincia->provincia }}
                    </option>
                @endforeach
            </select>
        </div>

{{-- Select para filtrar por usuario --}}
        <div class="w-1/2 bg-blue-200 p-4">
            <label for="filtro_usuario" class="block text-gray-700 text-sm font-bold mb-2">Filtrar por Usuario:</label>
            <select id="filtro_usuario" onchange="aplicarFiltroUsuario(this.value)"
                    class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Todos los Usuarios</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}"
                            {{ request('usuario_id') == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="w-1/2 bg-blue-200 p-4">
            <div class="flex justify-end">
                <a href="/expedientes/create">
                    <button class="flex justify-right rounded-md mb-1 bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        <i class="bi bi-plus"> Agregar Expediente</i>
                    </button>
                </a>
            </div>    
        </div>
    </div>
    {{ $expedientes->appends(request()->except('page'))->links() }}
    {{-- {{ $expedientes->links() }} --}}
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Expediente</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Título</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Tpo. Gestión</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Técnico</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($expedientes as $expediente)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="/expedientes/{{ $expediente['id']}}" class="hover:underline"><strong>{{ $expediente->id}}</strong></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="/expedientes/{{ $expediente['id']}}" class="hover:underline"><strong>{{ $expediente->num_expte}}</strong></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900">{{ \Illuminate\Support\Str::limit($expediente->titulo, 40, '...') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->provincia->provincia }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->estado->estado }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_total_gestion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->usuario->usuario }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $expedientes->appends(request()->except('page'))->links() }}
    {{-- {{ $expedientes->links() }} --}}

</x-layout>
    <script>
        function aplicarFiltroProvincia(provinciaId) {
            // Construye la URL con el parámetro de la provincia
            const url = new URL(window.location.href);
            if (provinciaId) {
                url.searchParams.set('provincia_id', provinciaId);
            } else {
                url.searchParams.delete('provincia_id'); // Si selecciona "Todas", quita el parámetro
            }
            url.searchParams.delete('page'); // Reinicia la paginación al aplicar un nuevo filtro
            window.location.href = url.toString(); // Redirige a la nueva URL
        }

        function aplicarFiltroUsuario(usuarioId) {
            // Construye la URL con el parámetro del usuario
            const url = new URL(window.location.href);
            if (usuarioId) {
                url.searchParams.set('usuario_id', usuarioId);
            } else {
                url.searchParams.delete('usuario_id'); // Si selecciona "Todas", quita el parámetro
            }
            url.searchParams.delete('page'); // Reinicia la paginación al aplicar un nuevo filtro
            window.location.href = url.toString(); // Redirige a la nueva URL
        }
    </script>