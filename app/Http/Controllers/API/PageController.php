<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return Page::with('chapter')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'page_number' => 'required|integer',
            'content' => 'required|string',
        ]);

        return Page::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return $page->load('chapter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $page->update($request->all());
        return $page;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return response()->noContent();
    }
}
