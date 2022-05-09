<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::group(
    ["middleware" => ["auth:sanctum"]],
    function (){
        Route::POST("/students",   [StudentController::class, 'update']);
        Route::GET("/students/{id}",    [StudentController::class, 'get']);
        Route::DELETE("/students/{id}", [StudentController::class, 'softDelete']);
    }
);
