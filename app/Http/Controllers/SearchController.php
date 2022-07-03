<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the search query with  Algolia
     *
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $query = trim($request['query']);

        $results = Test::query()->where('question', 'LIKE', "%{$query}%")->get();

        return view('search-results', compact('results', 'query'));
    }
}
