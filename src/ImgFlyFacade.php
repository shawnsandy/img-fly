<?php

namespace OtherCode\ImgFly;

use Illuminate\Support\Facades\Facade;

class ImgFlyFacade extends Facade
{
    protected static function getFacadeAccessor(): ImgFly
    {
        return new ImgFly();
    }

}
