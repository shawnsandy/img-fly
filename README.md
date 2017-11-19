# shawnsandy/img-fly

Dynamically resize images on the Fly

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

### If you are running php  5.4 or eariler

* Add the provider to your `config\app.php` providers.

```
ShawnSandy\ImgFly\ImgflyServiceProvider::class,
```

* Add the facade to your `config\app.php` alias.

```
"Imgfly" => ShawnSandy\ImgFly\Classes\ImgflyFacade::class,
```

* Add the route to your `routes\web.php`

```
Imgfly::routes();
```

### Install the php league Laravel glide package [Info and Instructions](https://github.com/thephpleague/glide-laravel)
```
composer require league/glide-laravel
```

## Usage

* Display and resize an image from your Storage folder `storage/app/images` directory `w=500` sets the image width to `500`.

``` php
Imgfly::imgFly('images/apple-mouse.jpeg?w=500')
```

* Display and resize an image from your `public/img` directory `w=500` sets the image width parameter to `500`. Read more on setting additional parameters (height, crop, orientation) [Glide quick reference](http://glide.thephpleague.com/1.0/api/quick-reference/).

``` php
Imgfly::imgPublic('hands.jpg?w=500', 'img')
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
