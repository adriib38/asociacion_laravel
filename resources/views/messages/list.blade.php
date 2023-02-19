@extends('layouts/layout')

@section('titulo', 'Mensajes')

@section('contenido')
    <h1>Mensajes ({{ count($messages) }})</h1>

    @if (count($messages) == 0)
        <p>No hay mensajes.</p>
    @else
        @foreach ($messages as $message)
            @if ($message->readed == 0)
                <article class="message no-readed">
                    <p><b>{{ $message->subject }}</b></p>
                    <p>{{ $message->text }}</p>
                    <a href="{{ route('messages.show', $message->id) }}">Leer</a>
                </article>
            @else
                <article class="message readed">
                    <p>{{ $message->subject }}</p>
                    <p>{{ $message->text }}</p>
                    <a href="{{ route('messages.show', $message->id) }}">Leer</a>
                </article>
            @endif
        @endforeach
    @endif

@endsection


