<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\MajorController;



Route::get("majors/create",[MajorController::class,'create'])->name("majors.create");

// Route::controller(MajorController::class)->name('majors.')->prefix('majors')->group(function(){

// Route::get("create",'create')->name("create");
// Route::post("/",'store')->name("store");

// });