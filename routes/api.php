<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CitaController;

Route::apiResource('citas', CitaController::class);

Route::get('/test', function () {
    return response()->json(['status' => 'ok']);
});
