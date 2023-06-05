<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Illuminate\Http\Request;

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

Route::get('/form1', function (Request $request) {
    $form_data = $request->session()->get('form_data');
    return view('form1',compact('form_data'));
});



//追記
Route::get('/create-form-1', [FormController::class, 'createForm1'])->name('create.form1');
Route::post('/post-form-1', [FormController::class, 'postForm1'])->name('post.form1');

Route::get('/create-form-2', [FormController::class, 'createForm2'])->name('create.form2');
Route::post('/post-form-2', [FormController::class, 'postForm2'])->name('post.form2');

Route::get('/create-form-3', [FormController::class, 'createForm3'])->name('create.form3');
Route::post('/post-form-3', [FormController::class, 'postForm3'])->name('post.form3');

Route::post('/save', [FormController::class, 'save'])->name('save');

Route::get('/thankyou', [FormController::class, 'thankyou'])->name('thankyou');
Route::get('/toppage', [FormController::class, 'toppage'])->name('toppage');

Route::post('/reset-form-data', [FormController::class, 'resetFormData'])->name('reset-form-data');

//


Route::post('/form2', [FormController::class, 'submitForm1'])->name('form1.submit');

// Route::get('/form2', function () {
//     if (セッション(){
//         return view('form2'); 
//     }

//     return view('form_toppage');
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


