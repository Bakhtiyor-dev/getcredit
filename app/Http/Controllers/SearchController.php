<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){

        $request->validate([
            'query' => 'required'
        ]);

        $query = $request['query'];

        $results = Test::search($query)->get();
      
        return view('search-results',compact('results','query'));
    }
}
