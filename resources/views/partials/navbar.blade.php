<nav>

    {{-- Todos --}}
    <a href="{{ route('inicio') }}"><img src="/images/logo.png" alt="Asociación Cultural del Mango en València" class="logo" width="100px"></a>
    <a href="{{ route('inicio') }}">Inicio</a>
    <a href="{{ route('members.index') }}">Miembros</a>
    <a href="{{ route('events.index') }}">Eventos</a>
    <a href="{{ route('messages.create') }}">Contacto</a>
    <a href="{{ route('donde_estamos') }}">Donde estamos</a>

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