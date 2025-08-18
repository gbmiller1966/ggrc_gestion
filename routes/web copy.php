<?php

//al pasar la lógica al modelo dejamos de usar Arr: use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Expediente;

/* Creamos el modelo Expediente y pasamos todo al modelo
class Expediente {
    public static function all() : array
    {
        return  
        [
            [
                'id' => 1,
                'numero' => 'EX-2022-00123068- -CFI-GES#DCS',
                'titulo' => 'Sistema Informático Integral Hipódromo de La Plata',
                'provincia' => 'Buenos Aires'
            ],
            [
                'id' => 2,
                'numero' => 'EX-2024-00013906- -CFI-GES#DC',
                'titulo' => 'Sistema de Gestión Electrónica para el Registro de Consultores y Fase II de Licitadores',
                'provincia' => 'La Pampa'
            ],
            [
                'id' => 3,
                'numero' => 'EX-2024-00024018- -CFI-GES#DC',
                'titulo' => 'Implementación del Sistema Único de Novedades de Agentes de la Educación',
                'provincia' => 'Tierra del Fuego'
            ]
        ];
    }
} */

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hi, hello', // when i load the view whe have access to $greeting
        'name' => "Willy"
        ]
    );
});

// Al definir la clase no necesitamos el use: Route::get('/expedientes', function () use($expedientes) {
Route::get('/expedientes', function (){
    return view('expedientes', [
        'expedientes' => Expediente::all()
        /* 'expedientes' => $expedientes
        [
            [
                'id' => 1,
                'numero' => 'EX-2022-00123068- -CFI-GES#DCS',
                'titulo' => 'Sistema Informático Integral Hipódromo de La Plata',
                'provincia' => 'Buenos Aires'
            ],
            [
                'id' => 2,
                'numero' => 'EX-2024-00013906- -CFI-GES#DC',
                'titulo' => 'Sistema de Gestión Electrónica para el Registro de Consultores y Fase II de Licitadores',
                'provincia' => 'La Pampa'
            ],
            [
                'id' => 3,
                'numero' => 'EX-2024-00024018- -CFI-GES#DC',
                'titulo' => 'Implementación del Sistema Único de Novedades de Agentes de la Educación',
                'provincia' => 'Tierra del Fuego'
            ]
        ] */

/*         'greeting' => 'Hi, hello', // when i load the view whe have access to $greeting
        'name' => "Willy" */
    ]);
});

// Creando la clase, no se necesita el use Route::get('/expedientes/{id}', function ($id) use($expedientes) {
Route::get('/expedientes/{id}', function ($id){
    //dd($id); //dump the id and then die, muestra en la página info del id
/*     [
        [
            'id' => 1,
            'numero' => 'EX-2022-00123068- -CFI-GES#DCS',
            'titulo' => 'Sistema Informático Integral Hipódromo de La Plata',
            'provincia' => 'Buenos Aires'
        ],
        [
            'id' => 2,
            'numero' => 'EX-2024-00013906- -CFI-GES#DC',
            'titulo' => 'Sistema de Gestión Electrónica para el Registro de Consultores y Fase II de Licitadores',
            'provincia' => 'La Pampa'
        ],
        [
            'id' => 3,
            'numero' => 'EX-2024-00024018- -CFI-GES#DC',
            'titulo' => 'Implementación del Sistema Único de Novedades de Agentes de la Educación',
            'provincia' => 'Tierra del Fuego'
        ]
    ]; */

    /*  PHP tradicional
   \Illuminate\Support\Arr::first($expedientes, function($expediente) use ($id){
        return $expediente['id'] == $id;
    }); */
/*  Simplificamos en una línea: $expedientes = Expediente::all();
    $expediente = Arr::first($expedientes, fn($expediente) => $expediente['id'] == $id); */
    // Pasamos la lógica al modelo: $expediente = Arr::first(Expediente::all(), fn($expediente) => $expediente['id'] == $id);
    $expediente = Expediente::find($id);
    //dd($expediente);
    return view('expediente', ['expediente' => $expediente]);
    
});


Route::get('/contact', function () {
    return view('contact');
});