<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class userController extends Controller
{
        public function index()
        {
                $users = user::all();
                return view('user.index', compact('users'));
        }

        public function create()
        {
                return view('user.create');
        }

        public function store(Request $request)
        {
                $request->validate(['name' => 'required|string', 'email' => 'required|string', 'password' => 'required|string']);
                user::create($request->all());
                return redirect()->route('user.index')->with('success', 'user created successfully');
        }

        public function show(user $user)
        {
                return view('user.show', compact('user'));
        }

        public function edit(user $user)
        {
                return view('user.edit', compact('user'));
        }

        public function update(Request $request, user $user)
        {
                $validated = $request->validate(['name' => 'required', 'email' => 'required', 'password' => 'required']);
                $user->update($validated);
                return redirect()->route('user.index')->with('success', 'user updated successfully');
        }

        public function destroy(user $user)
        {
                $user->delete();
                return redirect()->route('user.index')->with('success', 'user deleted successfully');
        }
}
