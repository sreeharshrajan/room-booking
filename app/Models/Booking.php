<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, Uuids;

    protected $primaryKey = 'uuid';

    protected $guarded = ['uuid'];
    protected $table = 'bookings';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
