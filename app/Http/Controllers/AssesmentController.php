<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class AssesmentController extends Controller
{

    /**
     * Start assesment
     *
     * @param Request $request
     * @return view
     */
    public function index(Request $request){
        
        $request->validate([
            'subject_id'=>'required|integer',
        ]);
        
        $subject = Subject::find($request->subject_id);
        
        $tests = $subject->tests()
                            ->inRandomOrder()
                            ->take(20)       
                            ->get();

        if($tests->isEmpty())
            abort(404); 
        
        session()->put('tests',$tests);
        session()->put('subject',$subject->title);
        session()->put('timing',$tests->count() * 2 * 60);
        
        return view('assesment.index',compact('tests','subject'));
    }

    /**
     * Check and show the result
     *
     * @param Request $request
     * @return view
     */
    public function check(Request $request){
        
        $tests = session()->pull('tests');
        $subject = session()->pull('subject');

        foreach($tests as $test){
            $test->check($request->except(['_token','tests']));    
        }
    
        $correct_count = $tests->where('is_correct',true)->count();
        
        $all =  $tests->count();
        $rating  = $correct_count.'/'.$all;
        $percent =  round($correct_count / $all * 100,1);

        return view('assesment.result',compact('tests','rating','percent','subject'))
                    ->with('result','true');
    }
}
