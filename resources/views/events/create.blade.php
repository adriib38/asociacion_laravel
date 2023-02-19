@extends('layouts/layout')

@section('titulo', 'Crear evento')

@section('contenido')
    <h1>Nuevo evento</h1>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        <br>
        <label for="location">Lugar:</label>
        <input type="text" name="location" id="location" value="{{ old('location') }}">
        <br>
        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date" value="{{ old('date') }}">
        <br>
        <label for="hour">Hora:</label>
        <input type="time" name="hour" id="hour" value="{{ old('hour') }}">
        <br>
        <label for="tags">Etiquetas:</label>
        <textarea name="tags" id="tags">{{ old('tags') }}</textarea>
        <br>
        <label for="visible">Visible:</label>
        <input type="checkbox" name="visible" id="visible">
        <button class="bg-green" type="submit">Crear evento</button>
    </form>

    @if($errors->any())
        Errores: <br>
        <ul>
            @foreach($errors->all() as $error)
                <li class="red">{{$error}}</li>
            @endforeach
        </ul>
    @endif

@endsection


