<?php

namespace App\Http\Controllers\User;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the booking.
     */
    public function index()
    {
        $bookings = Booking::get();
        return $this->renderView('frontend.booking.index', compact('bookings'), 'Booking');
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $rooms = Room::get();
        return $this->renderView('frontend.booking.create', compact('rooms'), 'Booking');
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'remarks' => 'required',
            'no_of_guests' => 'required|numeric',
        ]);

        Room::create([
            'user_id' => $request->auth()->user()->uuid,
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'no_of_guests' => $request->guests,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room details added successfully.');
    }

    /**
     * Display the specified booking.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
