<x-layout>
    <x-slot:heading>
        Edición de Región: {{ $region->region }}
    </x-slot:heading>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('regiones.update', $region->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <x-form-field>
                    <x-form-label for='region'>Región:</x-form-label>
                    <x-form-input name="region" id="region" value="{{ $region->region }}" required></x-form-input>
                    <x-form-error name="region"></x-form-error>
                </x-form-field>

                <div class="grid grid-cols-2 gap-2">
                    <x-btn-modificar></x-btn-modificar>
                    <x-btn-cancelar href="/regiones"></x-btn-cancelar>
                </div>
            </form>
        </div>
    </div>

</x-layout>

