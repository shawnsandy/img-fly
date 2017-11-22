<?php

Route::group(['prefix' => 'imgfly'], function(){

    Route::get('/public/{dir}/{path}', "\ShawnSandy\ImgFly\Controllers\ImgController")->where('path', '.+');

});
