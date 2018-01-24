<?php

namespace ShawnSandy\ImgFly\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class ImgController extends Controller
{
    public function __invoke($dir, $photo)
    {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => "./$dir/",
            'cache' => "$dir/",
            'source_path_prefix' => '/',
            'cache_path_prefix' => '/.cache',
            'base_url' => '/public/'
            ]);

        return $server->outputImage($photo, request()->all());
    }
}
