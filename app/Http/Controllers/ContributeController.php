<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContributeController extends Controller
{
    public function index(){
        return view('add');
    }
}
