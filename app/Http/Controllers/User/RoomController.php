<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingService;
use App\Http\Constants\BookingConstants;

class RoomController extends Controller
{
    /**
     * Display a list of the rooms.
     */
    public function index(BookingService $bookingService)
    {
        $today = Carbon::now()->toDateString();
        $rooms = $bookingService->availableRooms($today);
        return $this->renderView('frontend.rooms.index', compact('rooms'), 'Rooms');
    }

    public function getAvailableRooms(Request $request, BookingService $bookingService)
    {
        $start_date = $request->from_date;
        $end_date = $request->to_date;

        $fromDate = Carbon::parse($start_date)->toDateString();
        $toDate = Carbon::parse($end_date)->toDateString();

        $rooms = $bookingService->availableRooms($request->start_date, $request->end_date)->toArray();

        return response()->json([
            'message' => 'Rooms are available on these dates.',
            'rooms' => $rooms
        ]);
    }

}
