<?php

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/open_menu', [App\Http\Controllers\HomeController::class, 'open_menu'])->name('home.open_menu');


/*Patient Routes*/
Route::get('/patient', [App\Http\Controllers\PatientController::class, 'index'])->name('patient.index');
Route::get('/patient/create/{id?}', [App\Http\Controllers\PatientController::class, 'create'])->name('patient.create');
Route::post('/patient/store', [App\Http\Controllers\PatientController::class, 'store'])->name('patient.store');
Route::post('/patient/delete',  [App\Http\Controllers\PatientController::class, 'delete'])->name('patient.delete');
Route::post('/patientJson', [App\Http\Controllers\PatientController::class, 'patientJson'])->name('patient.json');

/*Doctor Routes*/
Route::get('/doctor', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.index');
Route::get('/doctor/create/{id?}', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');
Route::post('/doctor/store', [App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');
Route::post('/doctor/delete',  [App\Http\Controllers\DoctorController::class, 'delete'])->name('doctor.delete');
Route::post('/doctorJson', [App\Http\Controllers\DoctorController::class, 'doctorJson'])->name('doctor.json');



/*Appointment Routes*/
Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
Route::post('/appointment/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/appointmentJson', [App\Http\Controllers\AppointmentController::class, 'appointmentJson'])->name('appointment.json');


