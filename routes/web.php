<?php

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'HomeController@dashboard');

Route::get('test', function () {
    event(new App\Events\Alert('Someone'));
    return "Event has been sent!";
});
Route::get('oncall/{id}', 'HomeController@oncall');
Route::post('/push','PushController@store');
Route::get('/push','PushController@push')->name('push');
Route::resource('attendance', 'AttendanceController');
Route::resource('doctor', 'DoctorController');

//i make
Route::resource('specialtie', 'SpecialtieController'); //
