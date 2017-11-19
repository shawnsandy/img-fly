<?php

namespace ShawnSandy\ImgFly\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImgflyController extends Controller
{
    public function __invoke($dir, $path){
		$filesystem = app(Filesystem::class);
		$server = ServerFactory::create(
				[
				'response' => new LaravelResponseFactory(app('request')),
				'source' => $filesystem->getDriver(),
				'cache' => $filesystem->getDriver(),
				'source_path_prefix' => '/' . $dir,
				'cache_path_prefix' => '/.cache',
				'base_url' => '/glide/'
				]);
		return $server->getImageResponse($path, request()->all());
	}
}
