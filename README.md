# laravel-pinba-extension
Pinba integration for Laravel
## Description

Integrates [pinba](http://pinba.org/ "Pinba site") + [pinboard](https://intaro.github.io/pinboard/) with [Laravel](https://laravel.com "Laravel site")


## Installation

Require this package with composer:

    composer require tochka-developers/laravel-pinba-extension

After updating composer, add the `tochkaDevelopers\Pinba\ServiceProvider::class` to the providers array in config/app.php

> If you use a catch-all/fallback route, make sure you load the Pinba ServiceProvider before your own App ServiceProviders.

Copy the package config to your local config with the publish command:

    php artisan vendor:publish --provider="tochkaDevelopers\Pinba\ServiceProvider"
    
To register the Pinba server settings in .env    

    pinba.enabled = true
    pinba.server = host:port