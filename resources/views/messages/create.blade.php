@extends('layouts/layout')

@section('titulo', 'Nuevo mensaje')

@section('contenido')
    <h1>Nuevo mensaje</h1>

    <form method="POST" action="{{ route('messages.store') }}">
        @csrf

        <label for="Nombre">Nombre</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
            
        <br>

        <label for="subject">Asunto</label>
        <input type="text" name="subject" id="subject" value="{{ old('subject') }}">
            
        <br>

        <label for="text">Mensaje</label>
        <textarea name="text" id="text" cols="30" rows="10">{{ old('text') }}</textarea>
        
        <br>

        <button class="bg-green" type="submit">Enviar</button>
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


