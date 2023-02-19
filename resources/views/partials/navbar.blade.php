<nav>

    {{-- Todos --}}
    <a href="{{ route('inicio') }}">Inicio</a>
    <a href="{{ route('members.index') }}">Miembros</a>
    <a href="{{ route('events.index') }}">Eventos</a>
    <a href="{{ route('messages.create') }}">Contacto</a>
    <a href="{{ route('donde_estamos') }}">Donde estamos</a>


    {{-- Logueados --}}

    {{-- Logueados-admin --}}
    @auth 
        @if (Auth::user()->rol == 'admin')
            <a href="{{ route('events.create') }}">Evento nuevo</a>
            <a href="{{ route('messages.index') }}">Mensajes</a>
        @endif
    @endauth

    {{-- Logueados --}}
    @auth        
        <a href="{{ route('members.show', Auth::user()->id) }}">Cuenta</a>
        <a href="/logout">Logout</a>

    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Registro</a>
    @endauth
    
</nav>