<x-layout>
    <x-slot:heading>
        Contraparte
    </x-slot:heading>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4">
            <h1 class="font-bold text-lg">{{ $contraparte['nombre']}} {{ $contraparte['apellido']}}</h1>
            <h2><strong>Email: </strong><a href="mailto:{{ $contraparte['email']}}" class="text-blue-500 hover:underline"><i class="bi bi-envelope"><strong> {{ $contraparte['email']}}</strong></i></a></h2>
            <h2><strong>Celular: </strong><a href="https://wa.me/{{ $contraparte['celular'] }}" class="text-blue-500 hover:underline" target="_blank"><i class="bi bi-whatsapp"><strong> {{ $contraparte['celular'] }}</strong></i></a></h2>
            <h2><strong>Dependencia: </strong>{{ $contraparte->dependencia}}</h2>
            <h2><strong>Provincia: </strong>{{ $contraparte->provincia->provincia}}</h2>
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

</x-layout>