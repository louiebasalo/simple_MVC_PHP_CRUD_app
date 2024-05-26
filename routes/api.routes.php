<?php

use Routes\Route;



Route::post('/product/create','ProductController');











// in laravel
// Route::prefix('v1')->group(function (){
//     Route::apiResource('/tasks', TaskController::class);
//     Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
