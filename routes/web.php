<?php

use Illuminate\Support\Facades\Route;

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
  try {
    $location = geoip($ip = request()->ip());

    if($location['iso_code'] === "US"){
        return redirect("/us");
    }

    if($location['iso_code'] === "IN"){
        return redirect("/in");
    }

    if($location['iso_code'] === "AU"){
        return redirect("/au");
    }

    throw new Exception("Error Processing Request", 1);
    

  } catch (\Throwable $th) {
     return redirect("/in");
  }
});
