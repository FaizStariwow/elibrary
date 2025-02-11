<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
        public function index()
        {
                $roles = Role::all();
                return view('role.index', compact('roles'));
        }

        public function create()
        {
                return view('role.create');
        }

        public function store(Request $request)
        {
                $request->validate(['name' => 'required|string']);
                Role::create($request->all());
                return redirect()->route('role.index')->with('success', 'Role created successfully');
        }

        public function show(Role $role)
        {
                return view('role.show', compact('role'));
        }

        public function edit(Role $role)
        {
                return view('role.edit', compact('role'));
        }

        public function update(Request $request, Role $role)
        {
                $validated = $request->validate(['name' => 'required']);
                $role->update($validated);
                return redirect()->route('role.index')->with('success', 'Role updated successfully');
        }

        public function destroy(Role $role)
        {
                $role->delete();
                return redirect()->route('role.index')->with('success', 'Role deleted successfully');
        }
}
