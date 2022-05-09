<?php


use App\Http\Controllers\StudentCourseEnrollmentController;
use Illuminate\Support\Facades\Route;

Route::group(
    ["middleware" => ["auth:sanctum"]],
    function (){
        Route::POST("/test",        [StudentCourseEnrollmentController::class, 'update']);
        Route::GET("/test/{id}",    [StudentCourseEnrollmentController::class, 'get']);
        Route::DELETE("/test/{id}", [StudentCourseEnrollmentController::class, 'softDelete']);
    }
);
