@extends('layouts/layout')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Asociación Cultural del Mango en València</h1>
    @auth
        <h3>Bienvenido, {{ Auth::user()->name }}</h3>
        <p>Somos una asociación de amantes a los mangos. Nos gusta comerlos, verlos, olerlos, tocarlos, y sobre todo, comerlos.</p>
    @else
        <p>Si eres como nosotros, ¡bienvenido! <a href="{{ route('register') }}">Regístrate</a> o <a href="{{ route('login') }}">inicia sesión</a> y empieza a disfrutar de nuestra comunidad.</p>

    @endauth
 
    <p class="label-box">Puedes ver un video resumen de todos nuestros eventos de 2022 <a href="https://bit.ly/3S00DJs" target="_blank"> aquí!</a></p>

    <img src="/images/back-mangos.jpg" width="500px">

@endsection
