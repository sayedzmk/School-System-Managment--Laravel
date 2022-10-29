<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolGrades\SchoolGradeController;
use App\Http\Controllers\ClassRooms\ClassRoomsController;

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
Auth::routes();

Route::group( ['middleware'=>['guest']],function () {
    Route::get('/', function()
    {
        return view('auth.login');
    });
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
    ],
    function(){
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
            ###################SchoolGrades###############
        Route::group(['namespace'=>'SchoolGrades'],function () {
            Route::resource('/school_garde', 'SchoolGradeController');
        });
        ###################ClassRooms###############
        Route::group(['namespace'=>'ClassRooms'],function () {
            Route::resource('/class_rooms','ClassRoomsController');
            Route::post('delete_all',  'ClassRoomsController@delete_all')->name('delete_all');
            Route::post('Filter_Classes',  'ClassRoomsController@Filter_Classes')->name('Filter_Classes');
        });
        ###################Section###############
        Route::group(['namespace'=>'Section'],function () {
            Route::resource('/section', 'SectionController');
            Route::get('/classes/{id}', 'SectionController@getclasses');
        });
        ###################Parent###############
        Route::view('/add-parent', 'livewire.form-addParent');
        ##################Teacher###############
        Route::group(['namespace'=>'Teacher'],function () {
            Route::resource('/teacher', 'TeacherController');
        });
    }
);







