<?php

Route::group(['prefix' => 'imgfly'], function(){


    Route::get('/{dir}/{path}', "\ShawnSandy\ImgFly\Controllers\ImgflyController")->where('path', '.+');


    Route::get('/public/{dir}/{path}', "\ShawnSandy\ImgFly\Controllers\ImgController")->where('path', '.+');

});
