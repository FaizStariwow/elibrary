<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('book.index', compact('books'));
    }

    public function create()
    {
        $category = Category::all();
        return view('book.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'category' => 'required'
        ]);

        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'category_id' => $request->input('category')
        ]);

        if ($book) {
            return redirect('/book')->with('msg', 'Motor berhasil ditambahkan');
        }
        return redirect('/book')->with('msg', 'Motor gagal ditambahkan');
    }

    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $book->load('category');
        $category = Category::all();
        return view('book.edit', compact('book', 'category'));
    }


    public function update(Request $request, Book $book)
{
    // Validasi input
    $request->validate([
        'title' => 'required',
        'category' => 'required',
        'author' => 'required'
    ]);

    // Tidak perlu menggunakan find() karena $book sudah di-passing sebagai model
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->category_id = $request->input('category');
    $book->save(); // Simpan perubahan

    // Redirect dengan pesan sukses
    return redirect()->route('book.index')->with('success', 'Book updated successfully');
}


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book deleted successfully');
    }
}
