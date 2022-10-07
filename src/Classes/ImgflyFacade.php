<?php

namespace ShawnSandy\ImgFly\Classes;


use Illuminate\Support\Facades\Facade;

class ImgflyFacade extends Facade
{

	protected static function getFacadeAccessor()
	{
		return ImgFly::class;
	}

}
