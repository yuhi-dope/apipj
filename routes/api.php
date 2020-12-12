<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::apiResource('/apis', ApiController::class);
