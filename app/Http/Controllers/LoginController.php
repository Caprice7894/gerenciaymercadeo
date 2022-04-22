<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController{

    public function login(Request $req){
        $ip = $req->ip();
        if (strcmp($ip, '127.0.0.1') === 0){
            $req->session()->put('user','admin');
            return redirect('/admin')->with('user', 'admin');
        }
        $req->session()->put('user','user');

        return response('403 - Acceso prohibido', 403)
            ->header('Content-Type','text/plain');
    }
}
