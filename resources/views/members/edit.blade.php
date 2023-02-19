@extends('layouts/layout')

@section('titulo', 'Editar cuenta')

@section('contenido')
    <h1>Editar cuenta</h1>
    <h3> {{$member->name}} </h3>
    
    <form action="{{route('members.update', $member->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        @method('put')

        <label for="password">Confirmar o cambiar contraseña</label>
        <input type="password" name="password" id="password">
        <br>

        <label for="birthday">Fecha de nacimiento</label>
        <input type="date" name="birthday" id="birthday" value="{{$member->birthday}}">
        <br>

        <label for="twitter">Twitter</label>
        <input type="text" name="twitter" id="twitter" value="{{$member->twitter}}">
        <br>

        <label for="instagram">Instagram</label>
        <input type="text" name="instagram" id="instagram" value="{{$member->instagram}}">
        <br>

        <label for="twitch">Twitch</label>
        <input type="text" name="twitch" id="twitch" value="{{$member->twitch}}">
        <br>
        
        <label for="photo">Foto</label>
        <input type="file" name="photo" id="photo">

        <br>

        <input class="bg-green" type="submit" value="Guardar">
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
