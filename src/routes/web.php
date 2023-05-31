<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form1', function () {
    return view('form1');
});


Route::post('/form2', [FormController::class, 'submitForm1'])->name('form1.submit');

// Route::get('/form2', function () {
//     return view('form2');
// });



// Route::get('/form3', function () {
//     return view('form3');
// });
Route::post('/form3', [FormController::class, 'submitForm2'])->name('form2.submit');


Route::post('/form4', [FormController::class, 'showForm3'])->name('form3.submit');
Route::post('/send-email', [FormController::class, 'sendEmail'])->name('sendEmail');

Route::get('/confirmation', function () {
    // 完了画面の処理を記述
    return view('emails.confirmation');
})->name('confirmation');
