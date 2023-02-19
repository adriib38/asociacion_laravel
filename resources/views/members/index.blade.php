@extends('layouts/layout')

@section('titulo', 'Miembros')

@section('contenido')
    <h1>Miembros ({{ count($members) }})</h1>

    @if (count($members) == 0)
        <p>No hay miembros.</p>
    @else
        {{-- Imprimir todos los miembros --}}
        @foreach ($members as $member)
            <article class="member">
                {{-- Si el usuario no tiene foto de perfil, se muestra una por defecto --}}
                <div class="flex">
                    @if ($member->profile_photo_path != null)
                        <img src="{{ $member->profile_photo_path }}" alt="Foto de {{ $member->name}}" width="100">
                    @else   
                        <img src="/profile_default.jpg" alt="Foto de {{ $member->name}}" width="100">
                    @endif
                    <h2>{{ $member->name }}</h2>
                </div>
                <div>
                {{-- Solo los usuarios logeados podrán acceder a la ficha del evento --}}
                @auth
                    <a href="{{ route('members.show', $member->id) }}">Ver usuario</a>
                @else
                    <a href="{{ route('login') }}">Inicia sesión para ver más información del miembro</a>
                @endauth
                </div>
            </article>
        @endforeach
    @endif

@endsection


