# AMI

## Composer

To install as a Composer package to be used with Laravel 5, simply run:

```sh
composer require "enniel/ami"
```

Once it's installed, you can register the service provider in `config/app.php` in the `providers` array:

```php
'providers' => [
  \Enniel\Ami\Providers\AmiServiceProvider::class,
]
```

Then publish assets with `php artisan vendor:publish`. This will add the file `config/ami.php`. 
