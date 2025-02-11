<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::create($credentials);

        if($user){
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'error' => 'Registration is Failed'
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
