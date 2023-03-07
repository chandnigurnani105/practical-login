<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\EmployeeController;


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

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/dashboard', [AuthManager::class, 'dashboard']); 


Route::get('/registration', [AuthManager::class, 'registration'])->name('registration')->middleware('guest');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post')->middleware('guest');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/employees',                    [EmployeeController::class, 'index'])           ->name('employee.list');
Route::post('/employee',                    [EmployeeController::class, 'store'])           ->name('employee.store');
Route::post('/employee/delete-multiple',    [EmployeeController::class, 'deleteMultiple'])  ->name('employee.deleteMultiple');
Route::get('/employee/detail/{id}',         [EmployeeController::class, 'detail'])          ->name('employee.detail');
Route::post('/employee/update/{id}',        [EmployeeController::class, 'update'])          ->name('employee.update');