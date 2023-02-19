<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;

use App\Models\Event;

class EventController extends Controller
{
    //Lista de eventos
    public function index()
    {
        //Obtiene eventos visibles
        $events = Event::where('visible', 1)->get();
        //Vista de lista de eventos
        return view('events.index', compact('events'));
    }

    public function create()
    {
        //Vista de formulario para crear evento
        return view('events.create');
    }

    public function show(Event $event)
    {
        //Obtiene si el usurio logueado está apuntado al evento
        $usuarioApuntado = auth()->user()->events->contains($event);
        //Obtiene el numero de asistentes
        $asistentes = $event->users->count();
        //Vista de evento con información de si el usuario está apuntado y el numero de asistentes
        return view('events.show', compact('event', 'usuarioApuntado', 'asistentes'));
    }

    public function edit(Event $event)
    {
        //Vista de formulario para editar evento
        return view('events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        //Se actualizan los datos del evento
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->hour = $request->hour;
        $event->tags = $request->tags;

        if ($request->visible == 'on') {
            $event->visible = true;
        } else {
            $event->visible = false;
        }

        //Se guarda el evento con los nuevos datos
        $event->save();
        //Redirigir a la vista de la lista de eventos
        return redirect()->route('events.index');
    }

    
    public function store(EventRequest $request)
    {
        //Se crea un nuevo evento
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->hour = $request->hour;
        $event->tags = $request->tags;

        if ($request->visible == 'on') {
            $event->visible = true;
        } else {
            $event->visible = false;
        }
        
        //Se guarda el evento
        $event->save();
        //Redirige a la vista de la lista de eventos
        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        //Elimina el evento
        $event->delete();
        //Redirige a la vista de la lista de eventos
        return redirect()->route('events.index');
    }

    public function signup(Event $event)
    {
        //Obtiene el usuario logueado
        $user = auth()->user();
        //Si el usuario no esta apuntado se apunta, si el usuario ya está apuntado no ocurre nada
        $user->events()->syncWithoutDetaching($event->id);

        //Redirigir a la vista del evento
        return redirect()->route('events.show', $event);
    }

    public function unsignup(Event $event)
    {
        //Obtiene el usuario logueado
        $user = auth()->user();
        //Si el usuario está apuntado se desapunta, si no está apuntado no ocurre nada
        $user->events()->detach($event->id);

        //Redirigir a la vista del evento
        return redirect()->route('events.show', $event);
    }
}
