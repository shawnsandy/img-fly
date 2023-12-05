<?php

namespace OtherCode\ImgFly;

class ImgFly
{
    public function routes()
    {
        include __DIR__.'../../Routes/web.php';
    }

    /**
     * Display images in storage/app
     *
     * @param  string  $image
     * @return string
     * @deprecated v0.1beta use img()
     */
    public function imgFly(string $image): string
    {
        return url('imgfly/images/'.$image);
    }

    /**
     * Display images in storage/app
     *
     *
     * @param  string  $image
     * @return string
     */
    public function img(string $image): string
    {
        return url('imgfly/images/'.$image);
    }


    /**
     * Display images from public/img
     *
     * @param  string  $image
     * @param  string  $dir
     * @return string
     */
    public function imgPublic(string $image, string $dir = 'img'): string
    {
        return $this->loadImg("public/$dir", $image);
    }

    /**
     * Load image create a full url to the image page
     *
     * @param  string  $path
     * @param  string  $image  default path with url parameters
     * @return string
     */
    public function loadImg(string $path, string $image): string
    {
        return url("/imgfly/$path/$image");
    }

    /**
     * @param $img
     * @param  string  $preset
     * @param  string  $callBackMethod
     * @return mixed
     */
    public function imgPreset($img, string $preset = 'small', string $callBackMethod = 'img')
    {
        $parameters = config("imgfly.{$preset}");
        return call_user_func([$this, $callBackMethod], $img.$parameters);
    }


}
