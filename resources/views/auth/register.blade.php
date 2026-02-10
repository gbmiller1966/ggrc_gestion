<x-layout>
    <x-slot:heading>
        Registro de Usuarios
    </x-slot:heading>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/register" method="POST" class="space-y-6">
                @csrf
                <x-form-field>
                    <x-form-label for='nombre'>Nombre:</x-form-label>
                    <x-form-input name="nombre" id="nombre" required></x-form-input>
                    <x-form-error name="nombre"></x-form-error>
                </x-form-field>
                <x-form-field>
                    <x-form-label for='apellido'>Apellido:</x-form-label>
                    <x-form-input name="apellido" id="apellido" required></x-form-input>
                    <x-form-error name="apellido"></x-form-error>
                </x-form-field>
                <x-form-field>
                    <x-form-label for='usuario'>Usuario:</x-form-label>
                    <x-form-input name="usuario" id="usuario" required></x-form-input>
                    <x-form-error name="usuario"></x-form-error>
                </x-form-field>
                <x-form-field>
                    <x-form-label for='email'>Email:</x-form-label>
                    <x-form-input name="email" id="email" type="email" required></x-form-input>
                    <x-form-error name="email"></x-form-error>
                </x-form-field>
                <x-form-field>
                    <x-form-label for='celular'>Celular:</x-form-label>
                    <x-form-input name="celular" id="celular" type="tel" required></x-form-input>
                    <x-form-error name="celular"></x-form-error>
                </x-form-field>
                <x-form-field>
                    <div>
                        <select name="direccion_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione la Dirección --</option>
                            @foreach($direcciones as $direccion)
                                <option value="{{ $direccion->id }}">{{ $direccion->direccion }}</option>
                            @endforeach
                        </select>
                    </div>
                </x-form-field>
                <x-form-field>
                    <div>
                        <select name="area_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione el Área --</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                            @endforeach
                        </select>
                    </div>
                </x-form-field>
                <x-form-field>
                    <x-form-label for='password'>Contraseña:</x-form-label>
                    <x-form-input name="password" id="password" type="password" required></x-form-input>
                    <x-form-error name="password"></x-form-error>
                </x-form-field>
                 <x-form-field>
                    <x-form-label for='password_confirmation'>Confirmar Contraseña:</x-form-label>
                    <x-form-input name="password_confirmation" id="password_confirmation" type="password" required></x-form-input>
                    <x-form-error name="password_confirmation"></x-form-error>
                </x-form-field>

                <div class="grid grid-cols-2 gap-2">
                    <x-btn-guardar> Registrarse</x-btn-guardar>
                    <x-btn-cancelar href="/"></x-btn-cancelar>
                </div>

            </form>
        </div>
    </div>

</x-layout>