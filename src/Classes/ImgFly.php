<?php

namespace ShawnSandy\ImgFly\Classes;

use Illuminate\Support\Facades\Facade;

class ImgFly
{

    public function routes()
    {
        include __DIR__ . '../../Routes/web.php';
    }

    /**
     * Display images in storage/app
     *
     * @param [string] $image_str
     * @return void
     * @deprecated v0.1beta use img()
     */
    public function imgFly($image_str)
    {
        return url('imgfly/images/' . $image_str);
    }

    /**
     * Display images in storage/app
     *
     *
     * @param [string] $image_str
     * @return void
     */
    public function img($image_str)
    {
        return url('imgfly/images/' . $image_str);
    }


    /**
     * Display images from public/img
     *
     * @param [string] $image_str
     * @param string $dir
     * @return void
     */
    public function imgPublic($image_str, $dir = '')
    {
        $path = "public";
        if (strlen($dir) > 0) {
            if (strpos($dir, '/') == false)
                $path .= "/" . $dir;
            else
                $path .= $dir;
        }

        return $this->loadImg($path, $image_str);
    }

    /**
     * Load image create a full url to the image page
     *
     * @param string $path
     * @param string $image default path with url parameters
     * @return url
     */
    public function loadImg($path, $image_string)
    {
        $fullPath = "/imgfly";
        if(strpos($path, "/" ) === 0)
            $fullPath .= $path;
        else
            $fullPath .= "/" . $path;

        if(strpos($image_string, "/" ) === 0)
            $fullPath .= $image_string;
        else
            $fullPath .= "/" . $image_string;


        return url($fullPath);
    }

    /**
     * @param string $preset
     * @param null|string $callBackMethod
     * @return mixed
     */
    public function imgPreset($img, $preset = 'small', $callBackMethod = 'img')
    {
        $parameters = config("imgfly.{$preset}");
        return call_user_func([$this, $callBackMethod], $img . $parameters);
    }


}
