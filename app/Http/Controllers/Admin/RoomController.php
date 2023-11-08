<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;

use Illuminate\Http\Request;
use Illuminate\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a list of the rooms.
     */
    public function index()
    {
        $rooms = Room::get();
        return $this->renderView('admin.rooms.index', compact('rooms'), 'Rooms');
    }

    /**
     * Show the form for creating a new room.
     */
    public function create()
    {
        // Get the last room number and increment it
        $lastRoom = Room::get('room_no')->last();
        $roomNo = $lastRoom ? $lastRoom->room_no + 1 : 101;
        return $this->renderView('admin.rooms.create', compact('roomNo'),'Add New Room');
    }

    /**
     * Store a newly created room in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_no' => 'required|unique:rooms',
            'name' => 'required',
            'description' => 'required',
            'rate' => 'required|numeric',
        ]);


        Room::create([
            'room_no' => $request->input('room_no'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'rate' => $request->input('rate'),
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room details added successfully.');
    }

    /**
     * Display the specified room.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified room.
     */
    public function edit( Room $room)
    {
        return $this->renderView('admin.rooms.edit', compact('room'),'Add New Room');
    }

    /**
     * Update the specified room in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'rate' => 'required|numeric',
        ]);

        $room->update([
            'name' => $request->name,
            'description' => $request->description,
            'rate' => $request->rate,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room details updated successfully.');
    }

    /**
     * Remove the specified room from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return  redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }
}
