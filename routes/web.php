<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\MajorController;
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
include_once __DIR__.'/dashboard.php';




Route::get("majors/create",[MajorController::class,'create'])->name("majors.create");

Route::post("majors/store",[MajorController::class,'store'])->name("majors.store");
Route::get("majors/index",[MajorController::class,'index'])->name("majors.index");
Route::get("majors/edit/{major}",[MajorController::class,'edit'])->name("majors.edit");
Route::put("majors/update/{major}",[MajorController::class,'update'])->name("majors.update");
Route::delete("majors/delete/{major}",[MajorController::class,'destroy'])->name("majors.delete");


Route::get('/', function () {
    return view('website.pages.home');
});

Route::get('/admin', function () {
    return view('dashboard.index');
});

