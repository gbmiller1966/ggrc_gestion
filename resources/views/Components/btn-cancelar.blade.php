{{-- btn-cancelar.blade.php --}}
@props(['href' => null])

@php
    // Definimos las clases base para no repetirlas
    $classes = "inline-flex justify-center items-center mt-1 rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        <i class="bi bi-x-circle-fill mr-2"></i> Cancelar
    </a>
@else
    <button type="button" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif



{{-- <button type="button" class="justify-center mt-1 rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    <a href="/regiones"><i class="bi bi-x-circle-fill"> Cancelar</i></a>
</button> --}}