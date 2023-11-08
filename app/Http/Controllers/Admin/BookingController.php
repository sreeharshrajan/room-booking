<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Facades\Validator;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the booking.
     */
    public function index()
    {
        $bookings = Booking::get();
        return $this->renderView('admin.booking.index', compact('bookings'), 'Booking');
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $rooms = Room::get();
        return $this->renderView('admin.booking.create', compact('rooms'), 'Book a room');
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'number' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'no_of_guests' => 'required|integer',
            'amount' => 'required|numeric',
            'remarks' => 'nullable',
        ]);

        Booking::create($request->all());

        return redirect('admin.booking.create')->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
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
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return  redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
