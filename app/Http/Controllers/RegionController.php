<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        
        return view('regiones.index', [
            'regiones' => Region::all()
        ]);
    }

    public function create(){
        return view('regiones.create');
    }

/*     public function show(){
        
    } */

    public function store(){
        request()->validate([
        'region' => 'required|max:50|min:4',
        ]);

        Region::create([
            'region' => request('region'),
        ]);
        return redirect('/regiones');
    }

    public function edit(Region $region){
        $region = Region::findOrFail($region->id);
        return view('regiones.edit', ['region' => $region]);
        
    }

    public function update(Region $region){
    
        request()->validate([
            'region' => 'required|max:50|min:4',
        ]);

        $region->update([
            'region' => request('region')
        ]);

        return redirect('/regiones');
        
    }

    public function destroy(Region $region){
        $region->delete();
        return redirect('/regiones');
        
    }
}
