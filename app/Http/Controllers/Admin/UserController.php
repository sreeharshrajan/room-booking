<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;


class UserController extends Controller
{

    /**
     * Display a listing of the user.
     */
    public function index()
    {
        $users = User::get();
        return $this->renderView('admin.user.index', compact('users'), 'Users');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return $this->renderView('admin.user.show', compact('user'), 'User Details');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return $this->renderView('admin.user.edit', compact('user'), 'Edit User Details');
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User details updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return  redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }
}
