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
//        if (!file_exists($dir . '/' . $photo)) {
//            if (config("logNotFoundImage"))
//                \Log::warning("Image Not Found - Path:'$dir . '/' . $photo'");
//            if (config("notFoundImagePath") != null)
//                $dir = config("notFoundImagePath");
//        }

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => "./$dir/",
            'cache' => "$dir/",
            'source_path_prefix' => '/',
            'cache_path_prefix' => '/.cache',
            'base_url' => '/public/'
        ]);

        if (!$server->sourceFileExists($photo)) {
            if (config("imgfly.logNotFoundImage"))
                \Log::warning("Image Not Found - Path:' " . $dir . '/' . $photo . "'");
            if (config("imgfly.notFoundImagePath") != null)
                return $server->outputImage(config("imgfly.notFoundImagePath"), request()->all());
        }

        return $server->outputImage($photo, request()->all());
    }
}
