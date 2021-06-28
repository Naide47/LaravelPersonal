<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function mision()
    {
        $titulo = "Misión";
        $activo = true;
        $servicios = ["Ventas", "Rentas", "Compras"];
        // $servicios = [];
        return view(
            'site.mision',
            compact('titulo', 'activo', 'servicios')
        );
    }

    public function vision()
    {
        $titulo = "Visión";
        return view('site.vision', compact('titulo'));
    }

    // public function home() {
    //     return view('site.home');
    // }

    // public function login() {
    //     return view('site.login');
    // }

    // public function loginPost(Request $request) {
    //     // Ejecutar validaciones de la petición
    //     $validateData = $request->validate([
    //         'password'=>'required|min:5|max:10',
    //         'email'=>'required|email'
    //     ]);
    //     $credentials = $request->only('email','password');
    //     if(Auth::attempt($credentials)) {
    //         return redirect()->route("home");
    //     } else {
    //         return redirect()->route('login')->withErrors([
    //             "password"=>"Las credenciales no coinciden"
    //         ]);
    //     }
    // }

    // public function logout() {
    //     Auth::logout();
    //     return redirect()->route('home');
    // }
}
