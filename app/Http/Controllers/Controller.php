<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Entrada;
use Illuminate\Support\Str;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    const RUTA_ARCHIVOS = '/srv/http/gerenciaymercadeo.com/storage/entradas/';

    public function index(){
        $articulos = Entrada::get();
        $articulos = compact('articulos');
        return view('welcome', $articulos);
    }

    public function show($entrada){
        $obj = Entrada::where('slug', $entrada)->get();
        if ($obj->isEmpty()){
            return json_encode([
                'error' => 'ENTRADA_NO_ENCONTRADA',
                'message' => 'No se ha encontrado la entrada'
            ]);
        }
        $articulo_md = file_get_contents(self::RUTA_ARCHIVOS . $obj[0]->slug . '.md');
        $articulo = Str::markdown($articulo_md);
        return json_encode(array(
            'titulo' => $obj[0]->titulo,
            'articulo' => $articulo,
            'fecha' => $obj[0]->created_at,
            'autor' => $obj[0]->autor
        ));
    }

}
