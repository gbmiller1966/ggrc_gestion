<x-layout>
    <x-slot:heading>
        Proveedor
    </x-slot:heading>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4">
            <h1 class="font-bold text-lg">{{ $proveedor['razon']}}</h1>
            <h1><strong>Cuit: </strong>{{ $proveedor['cuit']}}</h1>
            <h1><strong>N° proveedor: </strong>{{ $proveedor['num_proveedor']}}</h1>
            <h1><strong>Email: </strong>{{ $proveedor['email']}}</h1>
            <h1><strong>Teléfono: </strong>{{ $proveedor['tel']}}</h1>
            <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4"> 
            <h1 class="font-bold text-lg">Información del contacto: </h1>
            <h2><strong>Nombre y Apellido: </strong>{{ $proveedor['contacto']}}</h2>
            <h2><strong>Email: </strong><a href="mailto:{{ $proveedor['contacto_email']}}" class="text-blue-500 hover:underline"><i class="bi bi-envelope"><strong> {{ $proveedor['contacto_email']}}</strong></i></a></h2>
            <h2><strong>Celular: </strong><a href="https://wa.me/{{ $proveedor['contacto_telular'] }}" class="text-blue-500 hover:underline" target="_blank"><i class="bi bi-whatsapp"><strong> {{ $proveedor['contacto_celular'] }}</strong></i></a></h2>
            <h2><strong>Provincia: </strong>{{ $proveedor->provincia->provincia}}</h2>
        </div>
        <div class="p-4">
            <div class="text-right mb-4">
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <i class="bi bi-pencil"> Editar</i>
                </button>
            </div>
        </div>
    </div>

    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
        <div class="flex justify-end">
        <a href="/proveedores">
            <button class="flex justify-right rounded-md mb-1 bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="bi bi-house"> Volver</i>
            </button>
        </a>
    </div>    

</x-layout>