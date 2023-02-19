@extends('layouts/layout')

@section('titulo', 'Registro')

@section('contenido')
    <h1>Nuevo usuario</h1>

    <form id="form-register" action="{{route('register')}}" method="POST">
        @csrf

        Name:
        <input type="text" name="name" value="{{old('name')}}">

        Email:
        <input type="email" name="email" value="{{old('email')}}">

        Contraseña:
        <input type="password" name="password">

        Confirma contraseña:
        <input type="password" name="password_confirmation">

        <input class="bg-green" type="submit" name="enviar" value="Registrarme">
    </form>

    @if($errors->any())
        Hay errores en el formulario: <br>
        <ul>
            @foreach($errors->all() as $error)
                <li class="red">{{$error}}</li>
            @endforeach
        </ul>
    @endif

@endsection
