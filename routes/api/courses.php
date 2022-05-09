<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::group(
    ["middleware" => ["auth:sanctum"]],
    function (){
        Route::POST("/courses",   [CourseController::class, 'update']);
        Route::GET("/courses/{id}",    [CourseController::class, 'get']);
        Route::DELETE("/courses/{id}", [CourseController::class, 'softDelete']);
    }
);
