<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('index', [
            'events' => Event::paginate(5)
        ]);
    }

    public function show(Event $event)
    {
        return view('show', compact('event'));
    }

    public function create()
    {
        return view('create');
    }

    public function edit(Event $event)
    {
        return view('edit', compact('event'));
    }
}
