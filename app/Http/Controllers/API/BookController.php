<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::with('bookshelf')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookshelf_id' => 'required|exists:bookshelves,id',
            'title' => 'required|string',
            'author' => 'required|string',
            'published_year' => 'required|digits:4',
        ]);

        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return $book->load('bookshelf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }
}
