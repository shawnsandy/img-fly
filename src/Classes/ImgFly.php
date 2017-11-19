<?php

namespace ShawnSandy\ImgFly\Classes;

use Illuminate\Support\Facades\Facade;



class ImgFly
{

	public function routes() {
		include __DIR__.'../../Routes/web.php';
	}

}
