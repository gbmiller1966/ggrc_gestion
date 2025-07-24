<?php

use Illuminate\Support\Facades\Route;
use App\Models\Expediente;

Route::get('/', function () {
/*     $expedientes = Expediente::all();
    dd($expedientes); */
    return view('home', 
        [
            'greeting' => 'Hi, hello', // when i load the view whe have access to $greeting
            'name' => "Willy"
        ]
    );
});

Route::get('/expedientes', function (){
    return view('expedientes', [
        'expedientes' => Expediente::all()
    ]);
});

Route::get('/expedientes/{id}', function ($id){
    $expediente = Expediente::find($id);
    return view('expediente', ['expediente' => $expediente]);
    
});

Route::get('/contact', function () {
    return view('contact');
});