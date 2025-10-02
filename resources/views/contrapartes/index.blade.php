<x-layout>
    <x-slot:heading>
        Gestión de Contrapartes Provinciales
    </x-slot:heading>
    <div class="flex justify-end">
        <a href="/contrapartes/create">
            <button class="flex justify-right rounded-md mb-1 bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="bi bi-plus"> Agregar</i>
            </button>
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Apellido</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Dependencia</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($contrapartes->skip(1) as $contraparte)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="/contrapartes/{{ $contraparte->id }}" class="text-blue-500 hover:underline"><strong> {{ $contraparte->apellido }}</strong></a></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="mailto:{{ $contraparte->email }}" target="_blank" class="text-blue-500 hover:underline"><i class="bi bi-envelope"><strong> {{ $contraparte->email }}</strong></i></a></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $contraparte->celular }}" target="_blank" class="text-blue-500 hover:underline"><i class="bi bi-whatsapp"><strong> {{ $contraparte->celular }}</strong></i></a></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contraparte->provincia->provincia }}</td>
                {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Illuminate\Support\Str::limit($contraparte->dependencia, 30, '...') }}</td> --}}
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="flex justify-end rounded-md bg-yellow-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-yellow-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                        <i class="bi bi-pencil"></i>
                    </button>
                </td>               
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <form action="/contrapartes/{{ $contraparte->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="flex justify-end rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

</x-layout>
