<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
        public function index()
        {
                $categories = category::all();
                return view('category.index', compact('categories'));
        }

        public function create()
        {
                return view('category.create');
        }

        public function store(Request $request)
        {
                $request->validate(['nama' => 'required|string']);
                category::create($request->all());
                return redirect()->route('category.index')->with('success', 'category created successfully');
        }

        public function show(category $category)
        {
                return view('category.show', compact('category'));
        }

        public function edit(category $category)
        {
                return view('category.edit', compact('category'));
        }

        public function update(Request $request, category $category)
        {
                $validated = $request->validate(['nama' => 'required']);
                $category->update($validated);
                return redirect()->route('category.index')->with('success', 'category updated successfully');
        }

        public function destroy(category $category)
        {
                $category->delete();
                return redirect()->route('category.index')->with('success', 'category deleted successfully');
        }
}
