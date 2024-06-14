<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get("/", [PageController::class, 'login'])->name('login');
    Route::post("/login", [AuthController::class, 'ceklogin']);
});

Route::group(['middleware' => ['auth']], function () {
Route::get("/logout", [AuthController::class, 'ceklogout']);
Route::get("/user", [PageController::class, 'edituser'])->middleware('auth');
Route::post("/updateuser", [PageController::class, 'updateuser']);
Route::get("/home", [PageController::class, 'home']);
Route::get("/masterdata", [PageController::class, 'masterdata']);
Route::get("/masterdata/form-add", [PageController::class, 'addexopet']);
Route::post("/save", [PageController::class, 'saveexopet']);
Route::get("/form-edit/{id}", [PageController::class, 'editexopet']);
Route::put("/update/{id}", [PageController::class, 'updateexopet']);
Route::get("/delete/{id}", [PageController::class, 'deleteexopet']);
});