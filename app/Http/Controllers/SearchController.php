<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->query('q');

        $books = Book::where('title', 'like', "%$q%")
            ->orWhere('author', 'like', "%$q%")
            ->get();

        return response()->json($books);
    }
}
