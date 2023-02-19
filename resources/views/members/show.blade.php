@extends('layouts/layout')

@section('titulo', 'Miembro')

@section('contenido')
    <h1>{{ $member->name }}</h1>
    
    {{-- Si el usuario no tiene foto de perfil, se muestra una por defecto --}}
    @if ($member->profile_photo_path != null)
        <img src="/{{ $member->profile_photo_path }}" alt="Foto de {{ $member->name }}" width="100">
    @else   
        <img src="/profile_default.jpg" alt="Foto de {{ $member->name}}" width="100">
    @endif


    <p>Rol: {{ $member->rol }}</p>
    <p>{{ $member->birthday }}</p>

    <br>
    @if ($member->email != null)
        Email: <a href="mailto:{{ $member->email }}" target="_blank">{{ $member->email }}</a>
    @endif
    <br>
    @if ($member->twitter != null)
        Twitter: <a href="https://twitter.com/{{ $member->twitter }}" class="usuario" target="_blank">{{ $member->twitter }}</a>
    @endif
    <br>
    @if ($member->instagram != null)
        Instagram: <a href="https://www.instagram.com/{{ $member->instagram }}" class="usuario" target="_blank">{{ $member->instagram }}</a>
    @endif
    <br>
    @if ($member->twitch != null)
        Twitch: <a href="https://twitch.tv/{{ $member->twitch }}" class="usuario" target="_blank">{{ $member->twitch }}</a>
    @endif

    {{-- Si el usuario es el logueado, se muestra el botón de editar --}}
    @if (Auth::user()->id == $member->id)
        <a href="{{ route('members.edit', $member->id) }}">Editar cuenta</a>
    @endif

    <p><i>Miembro desde {{ $member->created_at }}.</i></p>

    

@endsection
