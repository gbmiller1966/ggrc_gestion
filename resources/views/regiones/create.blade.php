<x-layout>

    <x-slot:heading>
        Gestión de Regiones
    </x-slot:heading>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Ingrese nombre de la región</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/regiones" method="POST" class="space-y-6">
                @csrf
                <x-form-field>
                    <x-form-label for='region'>Región:</x-form-label>
                    <x-form-input name="region" id="region" required></x-form-input>
                    <x-form-error name="region"></x-form-error>
                </x-form-field>
                {{--    @if ($errors->any())
                            <div class="mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500 text-xs">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                <div class="grid grid-cols-2 gap-2">
                    <x-btn-guardar>Guardar</x-btn-guardar>
                    <x-btn-cancelar href="/regiones"></x-btn-cancelar>
        {{--        <button type="button" class="justify-center mt-1 rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <a href="/regiones"><i class="bi bi-x-circle-fill"> Cancelar</i></a>
                    </button> --}}
                </div>
            </form>
        </div>
    </div>

</x-layout>

