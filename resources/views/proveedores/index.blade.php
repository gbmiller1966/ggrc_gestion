<x-layout>
    <x-slot:heading>
        Gestión de Proveedores
    </x-slot:heading>
    <div class="text-right mb-4">
        <a href="/proveedores/create">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                ➕ Agregar Proveedor
            </button>
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Razón Social</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Apellido</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($proveedores as $proveedor)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proveedor->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proveedor->razon }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proveedor->apellido }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proveedor->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $proveedor->celular }}" target="_blank" class="hover:underline">{{ $proveedor->celular }}</a></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proveedor->provincia->provincia }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        ✏️ Editar
                    </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        🗑️ Eliminar
                    </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="px-7 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        👁️ Ver
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

</x-layout>
