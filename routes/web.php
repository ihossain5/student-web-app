<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
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
});
Route::get('/student/all', [AdminController::class, 'show']);

Route::post('/student/add', [AdminController::class, 'store'])->name('add.student');

Route::get('/students/edit/{id}', [AdminController::class, 'getStudentById']);

Route::post('/students/update/{id}', [AdminController::class, 'update'])->name('update.student');

Route::delete('/students/delete/{id}', [AdminController::class, 'delete']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route::get('/student/all', [AdminController::class, 'show']);

});

Route::group(['prefix' => 'student', 'middleware' => ['auth', 'student']], function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});

require __DIR__ . '/auth.php';
