<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# KnotAPI test

## Features
- User can sign up.
- User can login.
- Create card for user.
- Get all merchants
- Create Card switcher task
- Update task status to finished
- Update task status to failed

## Installation
1. Ensure you have Php and composer installed

2. Clone this repo
```bash
$ git clone git@github.com:dharmykoya/knot-api-test.git
```
3. Install Dependencies
```bash
composer install
```

4. Run migration
```bash
php artisan migrate
```

5. Run seed
```bash
php artisan db:seed --class=MerchantSeeder
```
6. Install passport
```bash
php artisan passport:install
```

7. Install passport
```bash
php artisan passport:keys
```

8. Create .env file
```bash
touch .env
```

9. Start server
```bash
php artisan serve
```

## API Documentation
[documentation](https://documenter.getpostman.com/view/7508184/2s9YC5wrqW)

## Technology used
[Laravel](https://laravel.com)
- Laravel is a web application framework with expressive, elegant syntax.
## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
