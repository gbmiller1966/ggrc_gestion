<x-layout>
    <x-slot:heading>
        Expediente
    </x-slot:heading>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4">
            <h1 class="font-bold text-lg">Título: {{ $expediente['titulo']}}</h1>
            <h2><strong>Objeto: </strong>{{ $expediente['objeto']}}</h2>
            <h2><strong>Expediente: </strong>{{ $expediente['num_expte']}}</h2>
            <h2><strong>Región: </strong>{{ $expediente->region->region}} - <strong>Provincia: </strong>{{ $expediente->provincia->provincia}} - <strong>Localidad: </strong>{{ $expediente->localidad->localidad}}</h2>
            <h2><strong>Estado: </strong>{{ $expediente->estado->estado}} - <strong>Asignación Presupuestaria: </strong>{{ $expediente->asignacion->asignacion}} - <strong>Tipo de contrato: </strong>{{ $expediente->tipo->tipo}}</h2>
            <h2><strong>Tema estratégico: </strong>{{ $expediente->tema->tema}}</h2>
            <h2><strong>Técnico responsable: </strong>{{ $expediente->usuario->nombre}} {{ $expediente->usuario->apellido}}</h2>
        </div>
        <div class="p-4">
            <div class="text-right mb-4">
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <i class="bi bi-pencil"> Editar</i>
                </button>
                <a href="/hitos/{{ $expediente->id }}">
                    <button class="px-7 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <i class="bi bi-list"></i> Hitos
                    </button>
                </a>
            </div>
        </div>
    </div>

    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Montos: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Solicitud</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Contrato</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">A cargo CFI</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Total</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->monto_solicitud }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->monto_contrato }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->monto_cargo_cfi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->monto_total_contrato }}</td>
        </tbody>
    </table>
    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Proveedor: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Razon</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Apellido</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->proveedor->razon }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->proveedor->apellido }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $expediente->proveedor->celular }}" target="_blank" class="hover:underline"><i class="bi bi-whatsapp"> {{ $expediente->proveedor->celular }}</a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="mailto:{{ $expediente->proveedor->email}}"><i class="bi bi-envelope"></i> {{ $expediente->proveedor->email}}</h2></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->proveedor->provincia->provincia }}</td>
        </tbody>
    </table>
    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Contraparte: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Apellido</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Dependencia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->contraparte->apellido }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $expediente->contraparte->celular }}" target="_blank" class="hover:underline"><i class="bi bi-whatsapp"> {{ $expediente->contraparte->celular }}</a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="mailto:{{ $expediente->contraparte->email}}"><i class="bi bi-envelope"></i> {{ $expediente->contraparte->email}}</h2></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->contraparte->dependencia }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->contraparte->provincia->provincia }}</td>
        </tbody>
    </table>
    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Fechas de Gestión: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">CFI</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ÁREA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TÉCNICO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TDRS</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">DIRECCIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">GESTIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">CONTRATO</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_ingreso_cfi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_area }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_tecnico }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_elevacion_tdrs }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_firma_direccion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_gestion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_inicio_contrato }}</td>

        </tbody>
    </table>
    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Tiempos de Gestión: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">INGRESO CFI</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">CFI - ÁREA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ÁREA - TÉCNICO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TÉCNICO - TDRS</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TDRS - DIRECCIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">DIRECCIÓN - GESTIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">GESTIÓN - CONTRATO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TOTAL GESTION</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> - </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_cfi_area }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_area_tecnico }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_tecnico_elevacion_tdrs }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_elevacion_firma }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_direccion_gestion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_gestion_contrato }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_total_gestion }}</td>
        </tbody>
    </table>
</x-layout>