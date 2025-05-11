<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Page;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Chapter::with('book')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'book_id' => 'required|exists:books,id',
            'title' => 'required|string',
            'chapter_number' => 'required|integer',
        ]);

        return Chapter::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return $chapter->load('book');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $chapter->update($request->all());
        return $chapter;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return response()->noContent();
    }

    public function fullContent($id)
    {
        $chapter = Chapter::with('pages')->findOrFail($id);

        $fullContent = $chapter->pages->sortBy('page_number')->pluck('content')->implode("\n\n");

        return response()->json([
            'chapter_title' => $chapter->title,
            'full_content' => $fullContent,
        ]);
    }
}
