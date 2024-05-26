<?php


use Routes\Route;



Route::get('/','PageController','main');  // uri, controller, view name
Route::get('/add-product','PageController','add_product');

