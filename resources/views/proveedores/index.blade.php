<x-layout>
    <x-slot:heading>
        Gestión de Proveedores
    </x-slot:heading>
    <div class="flex justify-end">
        <a href="/proveedores/create">
            <button class="flex justify-right rounded-md mb-1 bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="bi bi-plus"> Agregar</i>
            </button>
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-400">
  <thead class="bg-gray-100">
    <tr>
      <th class="w-2/6 border border-gray-400 p-2 text-left">Razón Social</th>
      <th class="w-1/6 border border-gray-400 p-2 text-left">Contacto</th>
      <th class="w-1/6 border border-gray-400 p-2 text-left">Email</th>
      <th class="w-1/6 border border-gray-400 p-2 text-left">Celular</th>
      <th class="w-1/6 border border-gray-400 p-2 text-left">Provincia</th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
        @foreach($proveedores as $proveedor)
            <tr>
                <td class="w-2/6 border border-gray-400 p-2 text-sm text-blue-900 hover:underline"><a href="/proveedores/{{ $proveedor->id }}" class="text-blue-500 hover:underline"><strong> {{ $proveedor->razon }}</strong></a></td>
                <td class="w-1/6 border border-gray-400 p-2 text-sm text-gray-900">{{ $proveedor->contacto }}</td>
                <td class="w-1/6 border border-gray-400 p-2 text-sm text-blue-900 hover:underline"><a href="mailto:{{ $proveedor->contacto_email }}" target="_blank" class="text-blue-500 hover:underline"><strong>{{ $proveedor->contacto_email }}</strong></a></td>
                <td class="w-1/6 border border-gray-400 p-2 text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $proveedor->contacto_celular }}" target="_blank" class="text-blue-500 hover:underline"><strong>{{ $proveedor->contacto_celular }}</strong></a></td>
                <td class="w-1/6 border border-gray-400 p-2 text-sm text-gray-900">{{ $proveedor->provincia->provincia }}</td>
            </tr>
        @endforeach
  </tbody>
</table>

</x-layout>
