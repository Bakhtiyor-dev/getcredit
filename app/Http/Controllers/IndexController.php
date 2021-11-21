<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Test;

class IndexController extends Controller
{
    /**
     * Index page
     *
     * @return view 
     */

    public function index()
    {
        $subjects = Subject::available()->get();
        
        $count = Test::count();

        return view('index',compact('subjects','count'));
    }
}
