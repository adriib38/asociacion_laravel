@extends('layouts/layout')

@section('titulo', 'Eventos')

@section('contenido')
    <h1>Eventos</h1>

        {{-- Imprimir todos los eventos --}}
        <section id="events-list">
            <h2>Proximos eventos.</h2>

            @if (count($events) == 0)
                <p>No hay eventos próximos.</p>
            @else
            @foreach ($events as $event)
                <article class="event">
                    <h3>{{ $event->name }}</h3>
                    <span><b>{{ $event->date }} a las <span>{{ $event->hour }}</span></b></span>
                    <p>{{ $event->description }}</p>
                    <span>{{ $event->location }}</span>
                    <span>Tags: <i>{{ $event->tags }}</i></span>

                    <br>
                    
                    <div class="event-options">
                        {{-- Usuarios logeados --}}
                        @auth
                            {{-- Ficha del evento --}}
                            <a href="{{ route('events.show', $event->id) }}">Ver evento</a>
                            
                            {{-- Opcion de apuntarse/desapuntarse --}}
                            @if ($event->users->contains(Auth::user()->id))
                                <a href="{{ route('events.unsignup', $event->id) }}">Desapuntarme</a>
                            @else
                                <a href="{{ route('events.signup', $event->id) }}">Apuntarme</a>
                            @endif

                            {{-- Solo los usuarios administradores podrán editar el evento --}}
                            @if (Auth::user()->rol == 'admin')
                                <a href="{{ route('events.edit', $event->id) }}">Modificar evento</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input class="bg-red" type="submit" value="Eliminar evento">
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}">Inicia sesión para ver el evento</a>
                        @endauth
                    </div>

                </article>
            @endforeach
        </section>
    @endif

@endsection


