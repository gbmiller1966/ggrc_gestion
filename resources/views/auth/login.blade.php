<x-layout>
    <x-slot:heading>
        Login de Usuarios
    </x-slot:heading>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <form action="/login" method="POST" class="space-y-6">
                @csrf
                <x-form-field>
                    <x-form-label for='email'>Email:</x-form-label>
                    <x-form-input name="email" id="email" type="email" value="{{ old('email') }}" required></x-form-input>
                    <x-form-error name="email"></x-form-error>
                </x-form-field>
                <x-form-field>
                    <x-form-label for='password'>Contraseña:</x-form-label>
                    <x-form-input name="password" id="password" type="password" required></x-form-input>
                    <x-form-error name="password"></x-form-error>
                </x-form-field>

                <div class="grid grid-cols-2 gap-2">
                    <x-btn-guardar> Ingresar</x-btn-guardar>
                    <x-btn-cancelar href="/"></x-btn-cancelar>
                </div>

            </form>
        </div>
    </div>

</x-layout>