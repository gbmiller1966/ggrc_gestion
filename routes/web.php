<?php

use Illuminate\Support\Facades\Route;
use App\Models\Region;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Expediente;
use App\Models\Direccion;
use App\Models\Area;
use App\Models\Usuario;
use App\Models\Contraparte;
use App\Models\Proveedor;
use App\Models\Asignacion;
use App\Models\Tema;
use App\Models\Tipo;
use App\Models\Estado;
use App\Models\Informe;

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
    return view('expedientes.index', [
        'expedientes' => Expediente::all()
    ]);
});

Route::get('/expedientes/create', function (){
    $direcciones = Direccion::all();
    $areas = Area::all();
    $regiones = Region::all();
    $provincias = Provincia::all();
    $localidades = Localidad::all();
    $proveedores = Proveedor::all();
    $contrapartes = Contraparte::all();
    $asignaciones = Asignacion::all();
    $temas = Tema::all();
    $tipos = Tipo::all();
    $estados = Estado::all();

    return view('expedientes.create', [
        'direcciones' => $direcciones , 
        'areas' => $areas , 
        'regiones' => $regiones , 
        'provincias' => $provincias , 
        'localidades' => $localidades,
        'proveedores' => $proveedores,
        'contrapartes' => $contrapartes,
        'asignaciones' => $asignaciones,
        'temas' => $temas,
        'tipos' => $tipos,
        'estados' => $estados,
    ]);
});


Route::post('/expedientes', function(){
    //dd(request()->all());

    //tiempo desde que ingresa al CFI hasta que se deriva al área
    $fecha_ingreso_cfi = new DateTime(request('fecha_ingreso_cfi'));
    $fecha_derivacion_area = new DateTime(request('fecha_derivacion_area'));
    $diferencia_cfi_area = $fecha_ingreso_cfi->diff($fecha_derivacion_area); 
    $tiempo_cfi_area = $diferencia_cfi_area->days;

    //tiempo desde que el área se lo deriva al técnico
    $fecha_derivacion_tecnico = new DateTime(request('fecha_derivacion_tecnico'));
    $diferencia_area_tecnico = $fecha_derivacion_area->diff($fecha_derivacion_tecnico);
    $tiempo_area_tecnico = $diferencia_area_tecnico->days;

    //tiempo desde la derivación hasta la elevación de TDRs
    if(request('fecha_elevacion_tdrs')){
        $fecha_elevacion_tdrs = new DateTime(request('fecha_elevacion_tdrs'));
        $diferencia_tecnico_elevacion_tdrs = $fecha_derivacion_tecnico->diff($fecha_elevacion_tdrs);
        $tiempo_tecnico_elevacion_tdrs = $diferencia_tecnico_elevacion_tdrs->days;
    }else{
        $tiempo_tecnico_elevacion_tdrs = 0;
    }

    //tiempo desde la elevación hasta la firma de dirección 
    if(request('fecha_firma_direccion')){
        $fecha_firma_direccion = new DateTime(request('fecha_firma_direccion'));
        $diferencia_elevacion_firma = $fecha_elevacion_tdrs->diff($fecha_firma_direccion);
        $tiempo_elevacion_firma = $diferencia_elevacion_firma->days;
    }else{
        $tiempo_elevacion_firma = 0;
    }
  
    //tiempo desde la firma de direccion hasta el pase a gestión
    if(request('fecha_derivacion_gestion')){
        $fecha_derivacion_gestion = new DateTime(request('fecha_derivacion_gestion'));
        $diferencia_direccion_gestion = $fecha_firma_direccion->diff($fecha_derivacion_gestion);
        $tiempo_direccion_gestion = $diferencia_direccion_gestion->days;
    }else{
        $tiempo_direccion_gestion = 0;
    }

    //Total tiempo de gestión
    if(request('fecha_inicio_contrato')){
        $fecha_inicio_contrato = new DateTime(request('fecha_inicio_contrato'));
        $diferencia_ingreso_inicio = $fecha_ingreso_cfi->diff($fecha_inicio_contrato);
        $tiempo_total_gestion = $diferencia_ingreso_inicio->days;
    }else{
        $tiempo_total_gestion = 0;
    }

    //Plazo en meses del contrato
    $fecha_fin_contrato = new DateTime(request('fecha_fin_contrato'));
    $diferencia_inicio_fin = $fecha_inicio_contrato->diff($fecha_fin_contrato);
    $plazo = ($diferencia_inicio_fin->y * 12) + $diferencia_inicio_fin->m;

    //Monto total del contrato
    $monto_contrato = floatval(request('monto_contrato'));
    $monto_cargo_cfi = floatval(request('monto_cargo_cfi'));
    $monto_total_contrato = $monto_contrato + $monto_cargo_cfi;

    Expediente::create([
        'titulo' => request('titulo'),
        'objeto' => request('objeto'),
        'num_expte' => request('num_expte'),
        'fecha_ingreso_cfi' => $fecha_ingreso_cfi,
        'fecha_derivacion_area' => $fecha_derivacion_area,
        'tiempo_cfi_area' => $tiempo_cfi_area,
        'fecha_derivacion_tecnico' => $fecha_derivacion_tecnico,
        'tiempo_area_tecnico' => $tiempo_area_tecnico,
        'fecha_elevacion_tdrs' => $fecha_elevacion_tdrs,
        'tiempo_tecnico_elevacion_tdrs' => $tiempo_tecnico_elevacion_tdrs,
        'fecha_firma_direccion' => $fecha_firma_direccion,
        'tiempo_elevacion_firma' => $tiempo_elevacion_firma,
        'gde_firma_direccion' => request('gde_firma_direccion'),
        'fecha_derivacion_gestion' => $fecha_derivacion_gestion,
        'tiempo_direccion_gestion' => $tiempo_direccion_gestion,
        'fecha_inicio_contrato' => $fecha_inicio_contrato,
        'tiempo_total_gestion' => $tiempo_total_gestion,
        'plazo' => $plazo,
        'fecha_fin_contrato' => $fecha_fin_contrato,
        'monto_solicitud' => floatval(request('monto_solicitud')),
        'monto_contrato' => $monto_contrato,
        'monto_cargo_cfi' => $monto_cargo_cfi,
        'monto_total_contrato' => $monto_total_contrato,
        'fecha_aprobacion_if' => request('fecha_aprobacion_if'),
        'gde_aprobacion_if' => request('gde_aprobacion_if'),
        'fecha_envio_biblioteca' => request('fecha_envio_biblioteca'),
        'gde_envio_biblioteca' => request('gde_envio_biblioteca'),
        'fecha_envio_archivo' => request('fecha_envio_archivo'),
        'gde_envio_archivo' => request('gde_envio_archivo'),
        'region_id' => request('region_id'),
        'provincia_id' => request('provincia_id'),
        'localidad_id' => request('localidad_id'),
        'usuario_id' => 1,
        'contraparte_id' => request('contraparte_id'),
        'proveedor_id' => request('proveedor_id'),
        'asignacion_id' => request('asignacion_id'),
        'tema_id' => request('tema_id'),
        'tipo_id' => request('tipo_id'),
        'estado_id' => request('estado_id'),
    ]);

    return redirect('/expedientes');
});
Route::get('/expedientes/{id}', function ($id){
    $expediente = Expediente::find($id);
    return view('expedientes.show', ['expediente' => $expediente]);
    
});



//Gestión de Tablas

Route::get('/tablas', function () {
    return view('tablas.index');
});



//Regiones

Route::get('/regiones', function (){
    return view('regiones.index', [
        'regiones' => Region::all()
    ]);
});

Route::get('/regiones/create', function (){
    return view('regiones.create');
});

Route::post('/regiones', function(){
    //d(request()->all());
    Region::create([
        'region' => request('region'),
    ]);
    return redirect('/regiones');
});



//Provincias

Route::get('/provincias', function (){
    return view('provincias.index', [
        'provincias' => Provincia::all()
    ]);
}
);

Route::get('/provincias/create', function (){
    $regiones = Region::all();
    return view('provincias.create', ['regiones' => $regiones]);
});

Route::post('/provincias', function(){
    //d(request()->all());
    Provincia::create([
        'provincia' => request('provincia'),
        'region_id' => request('region_id'),
    ]);
    return redirect('/provincias');
});



//Localidades

Route::get('/localidades', function (){
    return view('localidades.index', [
        'localidades' => Localidad::all()
    ]);
}
);

Route::get('/localidades/create', function (){
    $provincias = Provincia::all();
    return view('localidades.create', ['provincias' => $provincias]);
});

Route::post('/localidades', function(){
    //d(request()->all());
    Localidad::create([
        'localidad' => request('localidad'),
        'provincia_id' => request('provincia_id'),
    ]);
    return redirect('/localidades');
});



//Direcciones

Route::get('/direcciones', function (){
    return view('direcciones.index', [
        'direcciones' => Direccion::all()
    ]);
}
);

Route::get('/direcciones/create', function (){
    return view('direcciones.create');
});

Route::post('/direcciones', function(){
    //d(request()->all());
    Direccion::create([
        'direccion' => request('direccion'),
    ]);
    return redirect('/direcciones');
});


//Areas

Route::get('/areas', function (){
    return view('areas.index', [
        'areas' => Area::all()
    ]);
}
);

Route::get('/areas/create', function (){
    $direcciones = Direccion::all();
    return view('areas.create', ['direcciones' => $direcciones]);
});

Route::post('/areas', function(){
    //d(request()->all());
    Area::create([
        'area' => request('area'),
        'direccion_id' => request('direccion_id'),
    ]);
    return redirect('/areas');
});



//Usuarios

Route::get('/usuarios', function (){
    return view('usuarios.index', [
        'usuarios' => Usuario::all()
    ]);
});

Route::get('/usuarios/create', function (){
    $direcciones = Direccion::all();
    $areas = Area::all();
    return view('usuarios.create', ['direcciones' => $direcciones], ['areas' => $areas]);
});

Route::post('/usuarios', function(){
    Usuario::create([
        'usuario' => request('usuario'),
        'password' => request('password'),
        'nombre' => request('nombre'),
        'apellido' => request('apellido'),
        'email' => request('email'),
        'celular' => request('celular'),
        'direccion_id' => request('direccion_id'),
        'area_id' => request('area_id'),
        'rol_id' => 4,
    ]);
    return redirect('/usuarios');
});



//Contrapartes

Route::get('/contrapartes', function (){
    return view('contrapartes.index', [
        'contrapartes' => \App\Models\Contraparte::all()
    ]);
});

Route::get('/contrapartes/create', function (){
    $provincias = Provincia::all();
    return view('contrapartes.create', ['provincias' => $provincias]);
});

Route::post('/contrapartes', function(){
    //d(request()->all());
    \App\Models\Contraparte::create([
        'nombre' => request('nombre'),
        'apellido' => request('apellido'),
        'email' => request('email'),
        'celular' => request('celular'),
        'dependencia' => request('dependencia'),
        'provincia_id' => request('provincia_id'),

    ]);
    return redirect('/contrapartes');
});



//Proveedores

Route::get('/proveedores', function (){
    return view('proveedores.index', [
        'proveedores' => \App\Models\Proveedor::all()
    ]);
});

Route::get('/proveedores/create', function (){
    $provincias = Provincia::all();
    return view('proveedores.create', ['provincias' => $provincias]);
});

Route::post('/proveedores', function(){
    //d(request()->all());
    \App\Models\Proveedor::create([
        'razon' => request('razon'),
        'nombre' => request('nombre'),
        'apellido' => request('apellido'),
        'email' => request('email'),
        'celular' => request('celular'),
        'dependencia' => request('dependencia'),
        'provincia_id' => request('provincia_id'),
    ]);
    return redirect('/proveedores');
});



//Asignaciones

Route::get('/asignaciones', function (){
    return view('asignaciones.index', [
        'asignaciones' => \App\Models\Asignacion::all()
    ]);
});

Route::get('/asignaciones/create', function (){
    return view('asignaciones.create');
});

Route::post('/asignaciones', function(){
    //d(request()->all());
    \App\Models\Asignacion::create([
        'asignacion' => request('asignacion'),
    ]);
    return redirect('/asignaciones');
});


//Temas Estratégicos

Route::get('/temas', function (){
    return view('temas.index', [
        'temas' => \App\Models\Tema::all()
    ]);
});

Route::get('/temas/create', function (){
    return view('temas.create');
});

Route::post('/temas', function(){
    //d(request()->all());
    \App\Models\Tema::create([
        'tema' => request('tema'),
    ]);
    return redirect('/temas');
});


//Tipos de Expedientes

Route::get('/tipos', function (){
    return view('tipos.index', [
        'tipos' => \App\Models\Tipo::all()
    ]);
});

Route::get('/tipos/create', function (){
    return view('tipos.create');
});

Route::post('/tipos', function(){
    //d(request()->all());
    \App\Models\Tipo::create([
        'tipo' => request('tipo'),
    ]);
    return redirect('/tipos');
});


//Estados del expediente
Route::get('/estados', function (){
    return view('estados.index', [
        'estados' => \App\Models\Estado::all()
    ]);
});

Route::get('/estados/create', function (){
    return view('estados.create');
});

Route::post('/estados', function(){
    //d(request()->all());
    \App\Models\Estado::create([
        'estado' => request('estado'),
    ]);
    return redirect('/estados');
});


//Informes
Route::get('/informes', function (){
    return view('informes.index', [
        'informes' => \App\Models\Informe::all()
    ]);
});

Route::get('/informes/create', function (){
    return view('informes.create');
});

Route::post('/informes', function(){
    //d(request()->all());
    \App\Models\Informe::create([
        'informe' => request('informe'),
    ]);
    return redirect('/informes');
});