<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Http\Services\BookingService;
use App\Http\Constants\BookingConstants;

class BookingController extends Controller
{
    /**
     * Display a listing of the booking.
     */
    public function index()
    {
        $bookings = DB::table(Booking::getTableName() . ' as b')
            ->select('b.uuid', 'b.start_date', 'b.end_date', 'b.status', 'b.remarks', 'b.no_of_guests', 'r.room_no')
            ->join(Room::getTableName() . ' as r', 'r.uuid', 'b.room_id')
            ->where('b.user_id', auth()->user()->uuid)
            ->orderBy('b.start_date', 'DESC')
            ->get();
        return $this->renderView('frontend.booking.index', compact('bookings'), 'Booking');
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create(BookingService $bookingService)
    {
        $today = Carbon::now()->toDateString();
        $rooms = $bookingService->availableRooms($today);
        return $this->renderView('frontend.booking.create', compact('rooms'), 'Booking');
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request, BookingService $bookingService)
    {
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'remarks' => 'required',
            'no_of_guests' => 'required|numeric',
        ]);
        $guests = $request->no_of_guests;
        if ($guests <= 2) {
            Booking::create([
                'user_id' => auth()->user()->uuid,
                'room_id' => $request->room_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'no_of_guests' => $request->no_of_guests,
                'remarks' => $request->remarks,
                'status' => BookingConstants::BOOKED,
            ]);
        } else {
            $roomsNeeded = ceil($guests / 2);
            $bookedRoomIds = [];
            $availableRooms = $bookingService->availableRooms($request->start_date, $request->end_date)->toArray();
            if (count($availableRooms) > $roomsNeeded) {
                foreach ($availableRooms as $room) {
                    $no_of_guests = min($guests, 2);

                    $roomId = $room->uuid;
                    if ($no_of_guests >= 1) {
                        $booking = new Booking([
                            'user_id' => auth()->user()->uuid,
                            'room_id' => $roomId,
                            'start_date' => $request->start_date,
                            'end_date' => $request->end_date,
                            'no_of_guests' => $no_of_guests,
                            'remarks' => $request->remarks,
                            'status' => BookingConstants::BOOKED,
                        ]);
                        $booking->save();
                        $bookedRoomIds[] = $roomId;
                        $guests -= $no_of_guests;
                    }
                }
            } else {
                return redirect()->back()->withErrors(['Insufficient available rooms for booking.']);
            }
        }

        return redirect()->route('user.booking.index')->with('success', 'Room details added successfully.');
    }

    private function bookRoom($bookedIds = [], $from_date, $to_date)
    {
        return DB::table(Room::getTableName() . ' as r')
            ->leftJoin(Booking::getTableName() . ' as b', 'b.room_id', 'r.uuid')
            ->where(function ($query) use ($from_date, $to_date) {
                $query->whereNull('b.room_id')
                    ->orWhere('b.start_date', '!==', $from_date)
                    ->orWhere('b.end_date', '!==', $to_date);
            })
            ->whereNotIn('r.uuid', $bookedIds)
            ->value('r.uuid');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking = DB::table(Booking::getTableName() . ' as b')
            ->select('b.uuid', 'b.number', 'b.created_at', 'b.start_date', 'b.end_date', 'b.status', 'b.remarks', 'b.no_of_guests', 'r.room_no', 'u.name as booking_user')
            ->join(Room::getTableName() . ' as r', 'r.uuid', 'b.room_id')
            ->join(User::getTableName() . ' as u', 'u.uuid', 'b.user_id')
            ->where('b.uuid', $booking->uuid)
            ->first();
        return view('frontend.booking.show', compact('booking'));
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
        return  redirect()->route('user.booking.index')->with('success', 'Booking deleted successfully!');
    }
}
