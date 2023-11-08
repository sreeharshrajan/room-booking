<?php

namespace App\Http\Constants;

class BookingConstants
{
    const DELETED = 0;
    const BOOKED = 1;
    const AVAILABLE = 2;

    const STATUS = [
        self::DELETED => 'Deleted',
        self::BOOKED => 'Booked',
        self::AVAILABLE => 'Available'
    ];
}
