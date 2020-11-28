<?php

Route::group(['prefix' => config("imgfly.routePrefix")], function(){

    Route::get('/public/{dir}/{path}', '\ShawnSandy\ImgFly\Controllers\ImgController')->where('path', '.+');

    Route::get('/{dir}/{path}', '\ShawnSandy\ImgFly\Controllers\ImgflyController')->where('path', '.+');

});
