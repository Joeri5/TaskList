<?php

use Illuminate\Http\Request;
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
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/task', function () {
    return view('tasks');
})->middleware(['auth'])->name('task');
Route::post('/task', function (Request $request) {
    //
});
Route::delete('/task/{id}', function ($id) {
    //
});
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/task')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Task...
});

require __DIR__ . '/auth.php';
