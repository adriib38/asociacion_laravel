@extends('layouts/layout')

@section('titulo', 'Editar evento')

@section('contenido')
    <h1>Editar evento</h1>
    <h3> {{$event->name}} </h3>
    
    <form action="{{route('events.update', $event->id)}}" method="post">
        @csrf

        @method('put')

        <label for="titulo">Nombre</label>
        <input type="text" name="name" id="name" value="{{$event->name}}"> 
        <br>
      
        <label for="contenido">Descripcion</label>
        <input name="description" id="description" value="{{$event->description}}">
        <br>
       
        <label for="location">Localizacion</label>
        <input name="location" id="location" value="{{$event->location}}">
        <br>

        <label for="date">Fecha</label>
        <input type="date" name="date" id="date" value="{{$event->date}}">
        <br>

        <label for="hour">Hora</label>
        <input type="time" name="hour" id="hour" value="{{$event->hour}}">
        <br>

        <label for="tags">Etiquetas</label>
        <input name="tags" id="tags" value="{{$event->tags}}">
        <br>

        <label for="visibilidad">Visible</label>
        <input type="checkbox" name="visible" id="visible" {{$event->visible==1 ? 'checked' : ''}}>
        <br>

        <input class="bg-green" type="submit" value="Guardar">
    </form>


    @if($errors->any())
        Hay errores en el formulario: <br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@endsection
