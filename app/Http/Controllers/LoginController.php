<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRequest;

class LoginController extends Controller
{
    public function registerForm()
    {
        //Si hay una sesión de usuario iniciada redirige a inicio
        if(auth()->user()) return view('inicio');
        else return view('auth.register');
    }

    public function loginForm()
    {
        //Si hay una sesión de usuario iniciada redirige a inicio
        if(auth()->user()) return view('inicio');
        else return view('auth.login');
    }
    

    public function register(UserRequest $request)
    {
        //Crea objeto usuario
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        //Guarda usuario
        $user->save();
        //Inicia sesión
        Auth::login($user);
        //Redirige a inicio
        return redirect()->route('inicio');
    }

    public function login(Request $request)
    {
        //Comprueba si el usuario tiene la contraseña
        $credentials = $request->only('name', 'password');

        //Si coninciden redirige a inicio
        if (Auth::attempt($credentials)) {
            return redirect()->route('inicio');
        }

        //Si no coinciden redirige a login con mensaje de error
        return redirect()->route('login')->withErrors([
            'name' => 'El nombre de usuario o la contraseña no son correctos',
        ]);
    }

    public function logout()
    {
        //Cerrar sesión
        Auth::logout();
        //Redirige a inicio
        return redirect()->route('inicio');
    }
}
