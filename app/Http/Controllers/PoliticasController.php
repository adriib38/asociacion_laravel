<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticasController extends Controller
{
    public function politicaPrivacidad()
    {
        return view('politicas.politica_privacidad');
    }

    public function politicaCookies()
    {
        return view('politicas.politica_cookies');
    }

    public function configuracionCookies()
    {
        return view('politicas.configuracion_cookies');
    }

    public function terminosCondiciones()
    {
        return view('politicas.terminos_y_condiciones');
    }
}
