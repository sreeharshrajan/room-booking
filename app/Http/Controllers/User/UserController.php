<?php

namespace App\Http\Controllers\User;

use Hash;
use Session;

use App\Models\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only(['username', 'password']);

        if (Auth::guard('user')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('user.home')->withSuccess('You have Successfully loggedin');
        } else {
            throw ValidationException::withMessages([
                'username' => 'Invalid username or password'
            ]);
        }

    }

    /**
     * Display a listing of the user.
     */
    public function index()
    {
        return view('frontend.home.index');
    }

    /**
     * Show the form for creating a new user.
     */
    public function register()
    {
        return view('frontend.auth.register');
    }

    /**
     * Store a newly created user in storage.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:6',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("rooms")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Display the specified user.
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'username' => $data['username'],
        'password' => Hash::make($data['password'])
      ]);
    }

    /**
     * Display the specified user.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userLogout()
    {
        Auth::guard('user')->logout();
        return redirect('home');
    }
}
