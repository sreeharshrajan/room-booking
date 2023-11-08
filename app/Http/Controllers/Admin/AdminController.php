<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display admin login form
     */
    public function showLoginForm()
    {
        return view('admin.login.index');
    }

    /**
     * Process admin login form
     */
    public function login(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only(['username', 'password']);

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        } else {
            throw ValidationException::withMessages([
                'username' => 'Invalid username or password'
            ]);
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('home');
    }

    /**
     * Display admin dashboard
     */
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $totalUsers = User::count();
        $totalRooms = Room::count();
        $totalBookings = Booking::count();
        $availableRooms = DB::table(Room::getTableName().' as r')
        ->leftJoin(Booking::getTableName().' as b', 'b.room_id', 'r.uuid')
        ->where(function($query) use ($today) {
            $query->whereNull('b.room_id')
                  ->orWhereDate('b.start_date', '<>', $today)
                  ->orWhereDate('b.end_date', '<>', $today);
        })
        ->select('r.*')
        ->count();
        return view('admin.dashboard.index', compact('totalRooms', 'totalBookings', 'totalUsers', 'availableRooms'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
