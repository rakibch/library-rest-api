<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookshelf;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bookshelf::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
        ]);

        return Bookshelf::create($request->only('name', 'location'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookshelf $bookshelf)
    {
        return $bookshelf;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookshelf $bookshelf)
    {
        $bookshelf->update($request->only('name', 'location'));
        return $bookshelf;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookshelf $bookshelf)
    {
        $bookshelf->delete();
        return response()->noContent();
    }
}
