<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('visible', 1)->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function show(Event $event)
    {
        $usuarioApuntado = auth()->user()->events->contains($event);
        $asistentes = $event->users->count();

        return view('events.show', compact('event', 'usuarioApuntado', 'asistentes'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {


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

        $event->save();

        return redirect()->route('events.index');
    }

    
    public function store(EventRequest $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

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

        $event->save();

        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();

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
