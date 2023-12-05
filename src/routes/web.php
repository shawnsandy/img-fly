<?php

use Illuminate\Support\Facades\Route;
use OtherCode\ImgFly\Controllers\ImgController;
use OtherCode\ImgFly\Controllers\ImgFlyController;

Route::group(['prefix' => 'imgfly'], function () {
    Route::get('/public/{dir}/{path}', ImgController::class)->where('path', '.+');
    Route::get('/{dir}/{path}', ImgFlyController::class)->where('path', '.+');
});
