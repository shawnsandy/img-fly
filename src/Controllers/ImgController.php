<?php

namespace ShawnSandy\ImgFly\Controllers;

use Illuminate\Routing\Controller;


class ImgController extends Controller
{

	public function __invoke($dir, $photo)
	{
		$server = ServerFactory::create([
			'source' => "./$dir/",
			'cache' =>  "$dir/",
			'source_path_prefix' => '/'. $dir,
			'cache_path_prefix' => '/.cache',
			]);
		return $server->outputImage($photo, request()->all());
	}

}
