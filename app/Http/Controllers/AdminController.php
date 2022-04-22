<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Entrada;
use Illuminate\Http\Request;
class AdminController extends BaseController{
    const RUTA_ARCHIVOS = '/srv/http/gerenciaymercadeo.com/storage/entradas/';

    public function show(Request $request){
        if ($request->session()->exists('user')){
            if(strcmp($request->session()->get('user'), 'admin') === 0){
                $request->session()->put('user','admin');
                return view('admin');
            }
        }
        return json_encode([
            'status' => 403,
            'message' => 'No autorizado'
        ]);
    }

    public function register(Request $request){
            $token = $request->session()->token();
            if(!empty($token)){
                $data = $request->all();
                $obj = new Entrada;
                $obj->titulo = $data['titulo'];
                $obj->slug = $data['slug'];
                $obj->autor = $data['autor'];

                if($obj->save()){

                    file_put_contents(self::RUTA_ARCHIVOS . $data['slug'] . '.md',
                       $data['articulo']);

                    return json_encode([
                        'status'=>200,
                        'message'=>'OK'
                    ]);
                }
    
                return json_encode([
                    'status' => 500,
                    'message' => 'Ocurrio un error'
                ]);
            }
            return json_encode([
                'status' => 400,
                'message' => 'no autorizado'
            ]);
    }
}
