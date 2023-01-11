<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth'],
    ],
    function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        ###################SchoolGrades###############
        Route::group(['namespace' => 'SchoolGrades'], function () {
            Route::resource('/school_garde', 'SchoolGradeController');
        });
        ###################ClassRooms###############
        Route::group(['namespace' => 'ClassRooms'], function () {
            Route::resource('/class_rooms', 'ClassRoomsController');
            Route::post('delete_all', 'ClassRoomsController@delete_all')->name('delete_all');
            Route::post('Filter_Classes', 'ClassRoomsController@Filter_Classes')->name('Filter_Classes');
        });
        ###################Section###############
        Route::group(['namespace' => 'Section'], function () {
            Route::resource('/section', 'SectionController');
            Route::get('/classes/{id}', 'SectionController@getclasses');
        });
        ###################Parent###############
        Route::view('/add-parent', 'livewire.form-addParent');
        ##################Teacher###############
        Route::group(['namespace' => 'Teacher'], function () {
            Route::resource('/teacher', 'TeacherController');
        });
        ##################Students###############
        Route::group(['namespace' => 'Student'], function () {
            Route::resource('/student', 'StudentController');
            Route::resource('/promotion', 'StudentPromotionController');
            Route::resource('Graduated', 'StudentGraduatedController');
            Route::resource('receipt_student', 'ReceiptStudentController');
            Route::resource('ProcessingFee', 'ProcessingFeeStudentController');
            Route::resource('payment', 'PymentStudentController');
            Route::resource('/attendance', 'AttendanceStudentController');
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
            Route::post('Upload_attachment', 'StudentController@Uploade_Attachment')->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
            Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
        });

        ##################Accounts###############
        Route::group(['namespace' => 'Accounts'], function () {
            Route::resource('/fees', 'AccountsController');
            Route::resource('/fees_invoice', 'FeeInvoiceController');
        });
    }
);
