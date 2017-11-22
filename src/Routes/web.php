<?php

Route::group(['prefix' => 'imgfly'], function(){

    Route::get('/public/{dir}/{path}', '\ShawnSandy\ImgFly\Controllers\ImgController')->where('path', '.+');

    Route::get('/img/{dir}/{path}', '\ShawnSandy\ImgFly\Controllers\ImgflyController')->where('path', '.+');

});
