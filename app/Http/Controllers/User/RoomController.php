<?php

namespace App\Http\Controllers\User;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a list of the rooms.
     */
    public function index()
    {
        $rooms = Room::get();
        return $this->renderView('frontend.rooms.index', compact('rooms'), 'Rooms');
    }

}
