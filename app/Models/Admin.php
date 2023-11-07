<?php

namespace App\Models;

use App\Traits\Uuids;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Uuids;

    protected $primaryKey = 'uuid';

    protected $guarded = ['uuid'];

    protected $table = 'admins';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
