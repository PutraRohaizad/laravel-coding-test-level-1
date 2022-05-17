<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Event::all(),
            'success' => true
        ], 200);
    }

    public function getActiveEvents()
    {
        $events = Event::active()->get();
        return response()->json([
            'data' => $events,
            'success' => true
        ], 200);
    }

    public function getEvent(Event $event)
    {
        return response()->json([
            'data' => $event,
            'success' => true
        ], 200);
    }

    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();    
        $event = Event::create($data);
        return response()->json([
            'data' => $event,
            'success' => true
        ], 201);
    }

    public function update(Event $event ,UpdateEventRequest $request)
    {
        $data = $request->validated();    
        $event->update($data);
        return response()->json([
            'data' => $event,
            'success' => true
        ], 200);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
