@extends('layouts/layout')

@section('titulo', '404')

@section('contenido')
    <h1>404</h1>
    <p>La página que buscas no existe.</p>

    <ul>
        <li><a href="{{route('inicio')}}">Inicio</a></li>
        <li><a href="{{route('members.index')}}">Miembros</a></li>
        <li><a href="{{route('events.index')}}">Eventos</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Registro</a></li>
        <li><a href="{{route('messages.create')}}">Contacto</a></li>
    </ul>
@endsection
