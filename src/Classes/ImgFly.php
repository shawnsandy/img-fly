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
     * @deprecated v0.1beta use img()
     * @param [string] $image_str
     * @return void
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
    public function imgPublic($image_str, $dir = 'img')
    {
        return $this->loadImg("public/$dir", $image_str);
    }

    /**
     * Load image create a full url to the image page
     *
     * @param string $path
     * @param string $image default path with url parameters
     * @return void
     */
    public function loadImg($path, $image_string)
    {
        return url("/imgfly/$path/$image_string");
    }

    /**
     * @param string $preset
     * @param null|string $callBackMethod
     * @return mixed
     */
    public function imgPreset($img, $preset = 'small', $callBackMethod = 'img')
    {
      $parameters = config("imgfly.{$preset}");
      return  call_user_func([$this, $callBackMethod], $img.$parameters);
    }



}
