![Screenshot](/screenshot.jpeg)

# Laravel ImgFly 

### Dynamically resize images on the Fly in your Laravel App using the [Glide library from thephpleague](http://glide.thephpleague.com/).

> Glide is a wonderfully easy on-demand image manipulation library written in PHP. Its straightforward API is exposed via HTTP, similar to cloud image processing services like Imgix and Cloudinary. Glide leverages powerful libraries like Intervention Image (for image handling and manipulation) and Flysystem (for file system abstraction).

- Adjust, resize and add effects to images using a simple HTTP based API.
- Manipulated images are automatically cached and served with far-future expires headers.
- Create your own image processing server or integrate Glide directly into your app.
- Supports both the GD library and the Imagick PHP extension.
- Supports many response methods, including PSR-7, HttpFoundation and more.
- Ability to secure image URLs using HTTP signatures.
- Works with many different file systems, thanks to the Flysystem library.
- Powered by the battle tested Intervention Image image handling and manipulation library.
- Framework-agnostic, will work with any project.
- Composer ready and PSR-2 compliant.
- [Get more info - glide.thephpleague.com](http://glide.thephpleague.com/)

## Install Glide Laravel

Via composer repository

* Installs using composer repositories add the following to your `composer.json` file

```
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/shawnsandy/img-fly"
        }
    ],
```

* Run the composer require to install the package

```
composer require shawnsandy/img-fly
```

### In Laravel 5.5 and higher the package automatically installs itself. If you are running Laravel  5.4 or earlier please follow the instructions below.

* Add the provider to your `config\app.php` providers.

```
ShawnSandy\ImgFly\ImgflyServiceProvider::class,
```

* Add the facade to your `config\app.php` alias.

```
"Imgfly" => ShawnSandy\ImgFly\Classes\ImgflyFacade::class,
```

### Routes

* Add the route to your `routes\web.php`

```
Imgfly::routes();
```

### Dependencies (required)

- Install the php league Laravel glide package [Info and Instructions](https://github.com/thephpleague/glide-laravel)
```
composer require league/glide-laravel
```

## Usage

* Display and resize an image from your Storage folder `storage/app/images` directory `w=500` sets the image width to `500`.


``` html
<img src="{{ Imgfly::imgFly('apple-mouse.jpeg?w=500') }}" alt="">
```

* Display and resize an image from your `public/img` directory `w=500` sets the image width parameter to `500`. Read more on setting additional parameters (height, crop, orientation) [Glide quick reference](http://glide.thephpleague.com/1.0/api/quick-reference/).

``` html
<img src="{{ Imgfly::imgPublic('hands.jpeg?w=500', 'img') }}" alt="">
```

### Presets

You can also use preset to dynamically resize image on the fly. Parameters are set in the config `app/imgfly.php` 

- Publish the config file


``` text
php artisan vendor:publish --tag=imgfly_config
```

- Open and modify the presets

``` php
[

    "icon" => "?w=60&h=60&fit=crop-center",

    "small" => "?w=100&h=100&fit=crop-center",

    "thumbnail" => "?w=200&h=200&fit=crop-center",

    "medium" => "?w=600&h=400&fit=crop-center",

    "large" => "?w=1200&h=600&fit=crop-center",

];
```

- Call the facade `Imgfly::imgPreset(image, preset_key = small, callBackMethod = 'img/imgPublic')` 


``` blade
<img src="{{ Imgfly::imgPreset('hands.jpg', 'icon') }}" alt="">
<img src="{{ Imgfly::imgPreset('hands.jpg', 'small') }}" alt="">
<img src="{{ Imgfly::imgPreset('hands.jpg', 'thumbnail') }}" alt="">
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email shawnsandy04@gmail.com instead of using the issue tracker.

## Credits

- [Shawn Sandy][link-author]


### TODO
- Add image upload ui
- Add unit test

### License
