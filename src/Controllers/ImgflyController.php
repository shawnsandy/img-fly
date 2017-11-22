<?php

namespace ShawnSandy\ImgFly\Controllers;

use Illuminate\Http\Request;
use League\Glide\ServerFactory;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;

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
