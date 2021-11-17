<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Parsers\TestsParser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ContributeController extends Controller
{
    public function index(){
        return view('add',[
            'subjects' => Subject::where('status',1)->get()
        ]);
    }

    public function storeFile(Request $request){
        
        $request->validate([
            'file'=>'required|mimes:txt',
            'subject'=>'required|integer'
        ]);
        
        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret'   => '6LcMsD4dAAAAAMoJ-PttFked4-aRtC89lU8n7sav',
            'response' => $request->input('g-recaptcha-response')
        ]);

        if($recaptchaResponse['success']){
            
            \App\Models\File::create([
                'url' => $request->file->store('/files'),
                'subject_id'=> $request->subject
            ]);

            return back()->with('success','Спасибо за поддержку! Ваш файл отправлен на модерацию.');
        }

        return back()->withErrors($recaptchaResponse['error-codes']);
                
    }

    public function importTests(){

        $tests = (new TestsParser(File::get('tests.txt')))->parse();

        try {
            foreach($tests as $test){
                $test->subject_id = 2;
                $test->status = true;
                $test->save();
            }
        } catch (\Throwable $th) {
            echo $th->errorInfo[2];
        } 
    }
}