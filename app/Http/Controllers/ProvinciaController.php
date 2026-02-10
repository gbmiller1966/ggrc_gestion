<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Region;

class ProvinciaController extends Controller
{
    public function index(){
        return view('provincias.index', [
            'provincias' => Provincia::all()
        ]);
    }

    public function create(){
        $regiones = Region::all();
        return view('provincias.create', ['regiones' => $regiones]);
    }

/*     public function show(){
        
    } */

    public function store(){
        request()->validate([
        'provincia' => 'required|max:50|min:4',
        'region_id' => 'required',
        ]);

        Provincia::create([
            'provincia' => request('provincia'),
            'region_id' => request('region_id'),
        ]);
        return redirect('/provincias');
    }

    public function edit(Provincia $provincia){
        $provincia = Provincia::findOrFail($provincia->id);
        $regiones = Region::all();
        return view('provincias.edit', ['provincia' => $provincia, 'regiones' => $regiones]);
        
    }

    public function update(Provincia $provincia){
        request()->validate([
            'provincia' => 'required|max:50|min:4',
            'region_id' => 'required',
        ]);

        $provincia->provincia = request('provincia');
        $provincia->region_id = request('region_id');
        $provincia->save();

        return redirect('/provincias');
        
    }

    public function destroy(Provincia $provincia){
        Provincia::findOrFail($provincia->id)->delete();
        return redirect('/provincias');
        
    }
}
