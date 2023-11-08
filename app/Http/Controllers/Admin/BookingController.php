<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

use Illuminate\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Constants\BookingConstants;

class BookingController extends Controller
{
    /**
     * Display a listing of the booking.
     */
    public function index()
    {
        $bookings = DB::table(Booking::getTableName().' as b')
        ->select('b.uuid', 'b.start_date', 'b.end_date', 'b.status', 'b.remarks', 'b.no_of_guests', 'r.room_no', 'u.name as booking_user')
        ->join(Room::getTableName().' as r', 'r.uuid', 'b.room_id')
        ->join(User::getTableName().' as u', 'u.uuid', 'b.user_id')
        ->orderBy('b.start_date', 'DESC')
        ->get();
        return $this->renderView('admin.booking.index', compact('bookings'), 'Booking');
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $users = User::get();
        $rooms = Room::get();
        return $this->renderView('admin.booking.create', compact('rooms', 'users'), 'Book a room');
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'no_of_guests' => 'required|integer|max:2',
            'remarks' => 'nullable',
        ]);

        $lastNumber = Booking::get('number')->last();
        $number = $lastNumber ? $lastNumber->number + 1 : 1000;

        Booking::create([
            'number' =>  $number,
            'user_id' => auth()->user()->uuid,
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'no_of_guests' => $request->no_of_guests,
            'remarks' => $request->remarks,
            'status' => BookingConstants::BOOKED,
        ]);

        return redirect('admin.booking.create')->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking = DB::table(Booking::getTableName().' as b')
        ->select('b.uuid', 'b.number', 'b.created_at', 'b.start_date', 'b.end_date', 'b.status', 'b.remarks', 'b.no_of_guests', 'r.room_no', 'u.name as booking_user')
        ->join(Room::getTableName().' as r', 'r.uuid', 'b.room_id')
        ->join(User::getTableName().' as u', 'u.uuid', 'b.user_id')
        ->where('b.uuid', $booking->uuid)
        ->first();
        return view('admin.booking.show', compact('booking'));
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
        return  redirect()->route('admin.booking.index')->with('success', 'Booking deleted successfully!');
    }
}
