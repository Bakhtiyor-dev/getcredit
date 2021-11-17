<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Test;
use Illuminate\Http\Request;

class AssesmentController extends Controller
{
    public function index(Request $request){
        
        $request->validate([
            'subject_id'=>'required|integer',
        ]);
        
        $subject = Subject::find(request()->subject_id);
        
        $tests = $subject->tests()
                            ->inRandomOrder()
                            ->take(20)
                            ->get();
       
        return view('assesment.index',compact('tests','subject'));
    }

    public function check(Request $request){

        $tests = Test::findMany(json_decode($request->tests));  
        
        foreach($tests as $test){
            $test->check($request->except(['_token','tests']));    
        }
    
        $correct_count = $tests->where('is_correct',true)->count();
        
        $all =  $tests->count();
        $rating  = $correct_count.'/'.$all;
        $percent =  round($correct_count / $all * 100,1);

        return view('assesment.result',compact('tests','rating','percent'))
                    ->with('result','true');
    }
}
