<?php


namespace App\Http\Helpers;

use Carbon\Carbon;


class DateHelper
{
    const SYSTEM_DATE_TIME_FORMAT = 'Y-m-d H:i:s';
    const SYSTEM_DATE_FORMAT = 'Y-m-d';
    const CUSTOM_DATE_FORMAT = 'd M Y';

    public static function format($dateTime, $from = self::SYSTEM_DATE_FORMAT, $to = self::CUSTOM_DATE_FORMAT)
    {
        return Carbon::createFromFormat($from, $dateTime)->format($to);
    }

    public static function getNoOfDays($fromDate, $toDate)
    {
        return Carbon::parse($fromDate)->diffInDays($toDate);
    }
}
