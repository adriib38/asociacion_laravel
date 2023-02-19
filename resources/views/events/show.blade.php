@extends('layouts/layout')

@section('titulo', 'Crear evento')

@section('contenido')
    <h1>{{ $event->name }}</h1>
    <p>{{ $event->description }}</p>
    <p>{{ $event->location }}</p>
    <p>{{ $event->date }}</p>
    <p>{{ $event->hour }}</p>
    <p>{{ $event->tags }}</p>

    <div id="event-assistance">
        @if ($usuarioApuntado)
            <h3>¡Estás apuntado!</h3>
            <a href="{{ route('events.unsignup', $event->id) }}">Desapuntarme</a>
        @else
            <h3>¡Apúntate!</h3>
            <a href="{{ route('events.signup', $event->id) }}">Apuntarme</a>
        @endif

        <p>Asistentes: {{ $asistentes }}</p>
    </div>

@endsection