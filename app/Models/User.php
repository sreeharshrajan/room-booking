<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Uuids;

    protected $primaryKey = 'uuid';

    protected $guarded = ['uuid'];

    protected $table = 'users';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
