<?php

namespace App\Http\Services;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function availableRooms($fromDate = null, $toDate = null)
    {
        if ($toDate !== '') {
            $toDate = $fromDate;
        }
            $toDate = $fromDate;
        }
        return DB::table(Room::getTableName() . ' as r')
            ->leftJoin(Booking::getTableName() . ' as b', function ($query) use ($fromDate, $toDate) {
                $query->on('r.uuid', '=', 'b.room_id')
                    ->whereDate('b.start_date', '<=', $fromDate)
                    ->whereDate('b.end_date', '>=', $toDate);
            })
            ->whereNull('b.room_id')
            ->select('r.*')
            ->distinct()
            ->get();
    }
}
