<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DigimonController;

Route::resource('digimons', DigimonController::class);

