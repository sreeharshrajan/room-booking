<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, Uuids;

    protected $primaryKey = 'uuid';

    protected $guarded = ['uuid'];
    protected $table = 'rooms';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

}
