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
use App\Models\Hito;

Route::get('/', function () {
/*     $expedientes = Expediente::all();
    dd($expedientes); */
    return view('home', 
        [
            'greeting' => 'Hi, hello', // when i load the view whe have access to $greeting
            'name' => "Willy"
        ]
    );
})->name('home');


//Expedientes

// routes/web.php
// Ruta para mostrar los expedientes (con filtro opcional de provincia)
Route::get('/expedientes', function () {
    $provincias = Provincia::all(); // Obtener todas las provincias para el select
    $usuarios = Usuario::all(); //Obtener todos los usuarios
    $expedientes = Expediente::with('provincia')->paginate(10); // Expedientes sin filtro inicial

    // Si viene una provincia seleccionada en la URL (por el filtro)
    if (request()->has('provincia_id') && request()->provincia_id != '') {
        $provinciaId = request()->provincia_id;
        $expedientes = Expediente::where('provincia_id', $provinciaId)
                                 ->with('provincia')
                                 ->paginate(10);
    }

    // Si viene un usuario seleccionado en la URL (por el filtro)
    if (request()->has('usuario_id') && request()->usuario_id != '') {
        $usuarioId = request()->usuario_id;
        $expedientes = Expediente::where('usuario_id', $usuarioId)
                                 ->with('usuario')
                                 ->paginate(10);
    }

    return view('expedientes.index', compact('provincias', 'usuarios', 'expedientes'));
})->name('expedientes.index');

/* Route::get('/expedientes', function (){
    return view('expedientes.index', [
        'provincias' => Provincia::all(),
        'expedientes' => Expediente::orderBy('provincia_id', 'asc')->orderBy('estado_id','asc')->latest()->paginate(15),
    ]);
}); */

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

    //tiempo desde elevación a la firma del jefe de área
    if(request('fecha_firma_area')){
        $fecha_firma_area = new DateTime(request('fecha_firma_area'));
        $diferencia_tecnico_area = $fecha_elevacion_tdrs->diff($fecha_firma_area);
        $tiempo_tecnico_area = $diferencia_tecnico_area->days;
    }else{
        $tiempo_tecnico_area = 0;
    }

    //tiempo desde la elevación hasta la firma de dirección - xxxxxxxxxxxxxxx
    if(request('fecha_firma_direccion')){
        $fecha_firma_direccion = new DateTime(request('fecha_firma_direccion'));
        $diferencia_elevacion_firma = $fecha_firma_area->diff($fecha_firma_direccion);
        $tiempo_area_direccion = $diferencia_elevacion_firma->days;
    }else{
        $tiempo_area_direccion = 0;
    }
  
    //tiempo desde la firma de direccion hasta el pase a gestión
    if(request('fecha_derivacion_compras')){
        $fecha_derivacion_compras = new DateTime(request('fecha_derivacion_compras'));
        $diferencia_direccion_compras = $fecha_firma_direccion->diff($fecha_derivacion_compras);
        $tiempo_direccion_compras = $diferencia_direccion_compras->days;
    }else{
        $tiempo_direccion_compras = 0;
    }
    
    if(request('fecha_inicio_contrato')){
        //tiempo desde el pase a gestión hasta el inicio del contrato
        $fecha_inicio_contrato = new DateTime(request('fecha_inicio_contrato'));
        $diferencia_compras_firma_contrato = $fecha_derivacion_compras->diff($fecha_inicio_contrato);
        $tiempo_compras_contrato = $diferencia_compras_firma_contrato->days;

        //Total tiempo de gestión desde ingreso hasta la firma del contrato
        $diferencia_ingreso_inicio = $fecha_ingreso_cfi->diff($fecha_inicio_contrato);
        $tiempo_total_gestion = $diferencia_ingreso_inicio->days;
    }else{
        $tiempo_compras_contrato = 0;
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
        'fecha_firma_area' => $fecha_firma_area,
        'tiempo_tecnico_area' => $tiempo_tecnico_area,
        'fecha_firma_direccion' => $fecha_firma_direccion,
        'tiempo_area_direccion' => $tiempo_area_direccion,
        'gde_firma_direccion' => request('gde_firma_direccion'),
        'fecha_derivacion_compras' => $fecha_derivacion_compras,
        'tiempo_direccion_compras' => $tiempo_direccion_compras,
        'fecha_inicio_contrato' => $fecha_inicio_contrato,
        'tiempo_compras_contrato' => $tiempo_compras_contrato,
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
    $expediente = Expediente::findOrFail($id);
    $provincias = Provincia::all();
    $proveedores = Proveedor::all();
    return view('expedientes.show', [
        'expediente' => $expediente,
        'provincias' => $provincias,
        'proveedores' => $proveedores
    ]);
    
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

Route::post('/regiones/{id}', function ($id){
    $region = Region::findOrFail($id);

    request()->validate([
        'region' => 'required|max:50',
    ]);

    $region->update([
        'region' => request('region'),
    ]);

    return redirect('/regiones');
});

Route::post('/regiones', function(){
    request()->validate([
        'region' => 'required|max:50',
    ]);

    Region::create([
        'region' => request('region'),
    ]);
    return redirect('/regiones');
});

Route::get('/regiones/{id}/edit', function ($id){
    $region = Region::findOrFail($id);
    return view('regiones.edit', ['region' => $region]);
});

Route::delete('/regiones/{id}', function ($id){
    $region = Region::findOrFail($id);
    $region->delete();
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
    
    request()->validate([
        'provincia' => 'required|max:50',
    ]);
    
    Provincia::create([
        'provincia' => request('provincia'),
        'region_id' => request('region_id'),
    ]);
    return redirect('/provincias');
});

Route::get('/provincias/{id}/edit', function ($id){
    $provincia = Provincia::findOrFail($id);
    return view('provincias.edit', ['provincia' => $provincia]);
});

Route::delete('/provincias/{id}', function ($id){
    $provincia = Provincia::findOrFail($id);
    $provincia->delete();
    return redirect('/provincias');
});


//Localidades
Route::get('/localidades', function (){
    $provincias = Provincia::all();
    $localidades = Localidad::all();
    return view('localidades.index', [
        'localidades' => $localidades,
        'provincias' => $provincias        
    ]);
});

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

Route::get('/localidades/{id}/edit', function ($id){
    $provincias = Provincia::all();
    $localidad = Localidad::findOrFail($id);
    return view('localidades.edit', ['provincias' => $provincias, 'localidad' => $localidad]);
});

Route::delete('/localidades/{id}', function ($id){
    $localidad = Localidad::findOrFail($id);
    $localidad->delete();
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
        'contrapartes' => Contraparte::all()
    ]);
});

Route::get('/contrapartes/create', function (){
    $provincias = Provincia::all();
    return view('contrapartes.create', ['provincias' => $provincias]);
});

Route::post('/contrapartes', function(){
    //d(request()->all());
    Contraparte::create([
        'nombre' => request('nombre'),
        'apellido' => request('apellido'),
        'email' => request('email'),
        'celular' => request('celular'),
        'dependencia' => request('dependencia'),
        'provincia_id' => request('provincia_id'),

    ]);
    return redirect('/contrapartes');
});

Route::get('/contrapartes/{id}', function ($id){
    $contraparte = Contraparte::find($id);
    return view('contrapartes.show', ['contraparte' => $contraparte]);
    
});



//Proveedores

Route::get('/proveedores', function (){
    $provincias = Provincia::all();
    $proveedores = Proveedor::where('razon', '!=', 'Sin datos')
                             ->orderBy('razon')
                             ->get();
    return view('proveedores.index', [
        'proveedores' => $proveedores,
        'provincias' => $provincias        
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
        'cuit' => request('cuit'),
        'num_proveedor' => request('num_proveedor'),
        'email' => request('email'),
        'tel' => request('tel'),
        'contacto' => request('contacto'),
        'contacto_email' => request('contacto_email'),
        'contacto_celular' => request('contacto_celular'),
        'documentacion' => request('documentacion'),
        'provincia_id' => request('provincia_id'),
    ]);
    return redirect('/proveedores');
});

Route::get('/proveedores/{id}', function ($id){
    $proveedor = proveedor::find($id);
    return view('proveedores.show', ['proveedor' => $proveedor]);
    
});


//Asignaciones

Route::get('/asignaciones', function (){
    return view('asignaciones.index', [
        'asignaciones' => Asignacion::all()
    ]);
});

Route::get('/asignaciones/create', function (){
    return view('asignaciones.create');
});

Route::post('/asignaciones', function(){
    //d(request()->all());
    Asignacion::create([
        'asignacion' => request('asignacion'),
    ]);
    return redirect('/asignaciones');
});


//Temas Estratégicos

Route::get('/temas', function (){
    return view('temas.index', [
        'temas' => Tema::all()
    ]);
});

Route::get('/temas/create', function (){
    return view('temas.create');
});

Route::post('/temas', function(){
    //d(request()->all());
    Tema::create([
        'tema' => request('tema'),
    ]);
    return redirect('/temas');
});


//Tipos de Expedientes

Route::get('/tipos', function (){
    return view('tipos.index', [
        'tipos' => Tipo::all()
    ]);
});

Route::get('/tipos/create', function (){
    return view('tipos.create');
});

Route::post('/tipos', function(){
    //d(request()->all());
    Tipo::create([
        'tipo' => request('tipo'),
    ]);
    return redirect('/tipos');
});


//Estados del expediente
Route::get('/estados', function (){
    return view('estados.index', [
        'estados' => Estado::all()
    ]);
});

Route::get('/estados/create', function (){
    return view('estados.create');
});

Route::post('/estados', function(){
    //d(request()->all());
    Estado::create([
        'estado' => request('estado'),
    ]);
    return redirect('/estados');
});


//Informes
Route::get('/informes', function (){
    return view('informes.index', [
        'informes' => Informe::all()
    ]);
});

Route::get('/informes/create', function (){
    return view('informes.create');
});

Route::post('/informes', function(){
    //d(request()->all());
    Informe::create([
        'informe' => request('informe'),
    ]);
    return redirect('/informes');
});


//Hitos
Route::get('/hitos/create/{id}', function ($id){
    $expediente = Expediente::findOrFail($id);
    $hitos = Hito::where('expediente_id', $id)->get();
    //dd($expediente);
    return view('hitos.create', ['expediente' => $expediente, 'hitos' => $hitos]);
});

Route::post('/hitos', function(){
    Hito::create([
        'hito' => request('hito'),
        'fecha' => request('fecha'),
        'expediente_id' => request('expediente_id'),
    ]);
    return redirect('/hitos/' . request('expediente_id'));
});

Route::get('/hitos/{id}', function ($id) {
    // 1. Obtener el expediente
    $expediente = Expediente::find($id);

    // 2. Realizar la consulta, ordenar por fecha de creación descendente
    // y luego paginar los resultados
    $hitos = Hito::where('expediente_id', $id)
                 ->orderBy('created_at', 'desc')
                 ->paginate(5);

    // 3. Pasar los objetos a la vista
    return view('hitos.index', ['expediente' => $expediente, 'hitos' => $hitos]);
});