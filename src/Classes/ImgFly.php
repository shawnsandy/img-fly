<?php

namespace ShawnSandy\ImgFly\Classes;

use Illuminate\Support\Facades\Facade;

class ImgFly
{

	public function routes() {
		include __DIR__.'../../Routes/web.php';
	}

	public function imgFly($image_str) {
		return url('imgfly/images/'.$image_str);
	}


	public function imgPublic($image_str, $dir = 'img'){
		return url("imgfly/public/$dir/$image_str");
	}

}
