<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Uuids, Notifiable;

    protected $primaryKey = 'uuid';

    protected $guard = 'user';
    protected $guarded = ['uuid'];

    protected $table = 'users';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
