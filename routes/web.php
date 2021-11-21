<?php

use App\Models\Subject;
use App\Models\Test;
use Illuminate\Support\Facades\Route;

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

Route::get('/','IndexController@index');

Route::get('search','SearchController@search')->name('search');

Route::get('/contribute','ContributeController@index')->name('contribute');

Route::post('/contribute','ContributeController@storeFile')->name('contribute.store');

Route::get('/assesment',function(){
    return abort(404);
});

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
    Route::prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('files')->name('files/')->group(static function() {
            Route::get('/',                                             'FilesController@index')->name('index');
            Route::get('/create',                                       'FilesController@create')->name('create');
            Route::post('/',                                            'FilesController@store')->name('store');
            Route::get('/{file}/edit',                                  'FilesController@edit')->name('edit');
            Route::get('/{file}/editFile',                              'FilesController@editFile')->name('edit.file');
            Route::get('/{file}/import',                                'FilesController@import')->name('import');
            Route::post('/bulk-destroy',                                'FilesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{file}',                                      'FilesController@update')->name('update');
            Route::post('/{file}/updateFile',                           'FilesController@updateFile')->name('update.file');            
            Route::delete('/{file}',                                    'FilesController@destroy')->name('destroy');
        });
    });
});