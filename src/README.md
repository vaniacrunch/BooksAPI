<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setting Up Project

Project is build up in Docker devilbox image and uses docker to easily up project locally

Project uses PHP v8.2 and Laravel 11.6

To start with application you should follow these steps 
- Copy .env.example file into .env file with your configurations
- Run `docker-compose up -d --build` to build needed relations
- Install composer dependencies by executing `composer install` command
- Run migrations and seeds with `php artisan migrate --seed`
- optimize application with `php artisan optimize`

## Short API Description

Application itself supports CRUD operations with books such as 
- Get list of Books on GET `api/books` route
- Get single book on GET `api/books/1` route
- Add new book to the list with POST `api/books` route
- Update existing book on PUT `api/books/1` route
- Delete book with DELETE `api/books/1` route

In addition full api example can be found in `Books.postman_collection.json` file in root of this project

## Code description
This project is build with all default Laravel abilities
- All repositories stored in `App/Repositories` folder
- All repositories should extend default `App\Repositories\Repository` class
- All repositories should define `$model` property with reference to Used model
- Repository implementation is bound to Interface in `AppServiceProvider`
- Services stored in `App\Services` folder

## Testing
This project supports pest tests, all configurations of Environment stored in `src\phpunit.xml`
For testing used sqlite database connection
To run tests use ./vendor/bin/pest command inside docker container
