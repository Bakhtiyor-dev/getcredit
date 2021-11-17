<?php

use App\Models\Subject;
use App\Models\Test;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
Route::get('/t',function(){

    class TestParser{

        protected $content;
        protected $collection = [];

        public function __construct($content)
        {
            $this->content = trim($content,"\n\t\0\+\''");
        }

        public function parse()
        {
            $this->serializeToModel(); 
            return $this->collection;
        }

        protected function chunkToQuestions(){
            return explode('++++',$this->content);
        }

        protected function serialize(){
            $arr=[];
            foreach($this->chunkToQuestions() as $question){
                $temp  = explode('====',trim($question));
                $arr[] = array_map(function($val){
                    return trim($val);
                },$temp); 
            }
            
            return $arr;
        }

        protected function serializeToModel(){
            foreach($this->serialize() as $a){
                $answers = $this->serializeAnswers($a);
              
                $test = new Test([
                    'question'         => $a[0],
                    'answers'          => $answers['answers'],
                    'correct_answer_id'=> $answers['correct_answer']
                ]);
                
                $this->collection[] = $test;    
            }
        }


        protected function serializeAnswers($array){
            $question = $array[0];
            array_shift($array);
            $serialized = [];
            $correct_answer = '';
            foreach($array as $key => $answer ){
                if(!empty($answer)){
                    
                    if($answer[0] == '#'){
                        $correct_answer = $key;
                        $answer = trim(ltrim($answer, '#'));
                    }
                    
                    $serialized[] = [
                        'id'  => $key,
                        'body'=> $answer
                    ];
                }
            }

            if($correct_answer === '')
                throw new Exception('Invalid structure: correct answer not given on question "'.$question.'"');
           
            return [
                'answers' => $serialized,
                'correct_answer'=>$correct_answer
            ];
        }
        
    }

    $tests = (new TestParser(File::get('tests.txt')))->parse();
    
    foreach($tests as $test){
        $test->subject_id = 2;
        $test->status = true;
        $test->save();
    }
    
     
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
    $subjects = Subject::where('status',1)->get();
    return view('index',compact('subjects'));
});


Route::get('/assesment',function(){
    return redirect('/');
});


Route::get('/contribute','ContributeController@index')->name('contribute');
Route::post('/assesment','AssesmentController@index')->name('assesment');

Route::post('/check','AssesmentController@check')->name('check');

Route::view('/result','assesment.result');

Route::view('/docs','docs.index');
Auth::routes();

require 'api.php';

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('subjects')->name('subjects/')->group(static function() {
            Route::get('/',                                             'SubjectsController@index')->name('index');
            Route::get('/create',                                       'SubjectsController@create')->name('create');
            Route::post('/',                                            'SubjectsController@store')->name('store');
            Route::get('/{subject}/edit',                               'SubjectsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SubjectsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{subject}',                                   'SubjectsController@update')->name('update');
            Route::delete('/{subject}',                                 'SubjectsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tests')->name('tests/')->group(static function() {
            Route::get('/',                                             'TestsController@index')->name('index');
            Route::get('/create',                                       'TestsController@create')->name('create');
            Route::post('/',                                            'TestsController@store')->name('store');
            Route::get('/{test}/edit',                                  'TestsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TestsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{test}',                                      'TestsController@update')->name('update');
            Route::delete('/{test}',                                    'TestsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('tests')->name('tests/')->group(static function() {
            Route::get('/',                                             'TestsController@index')->name('index');
            Route::get('/create',                                       'TestsController@create')->name('create');
            Route::post('/',                                            'TestsController@store')->name('store');
            Route::get('/{test}/edit',                                  'TestsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TestsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{test}',                                      'TestsController@update')->name('update');
            Route::delete('/{test}',                                    'TestsController@destroy')->name('destroy');
        });
    });
});