## QUICK GUIDE
### Installation
1. Install `Composer`
2. Install `node 18.15.0` (or `nvm`, if you use different node versions)
3. Install `mySql` or `mariaDB`

### Git Repository
1. Clone `this git repository`

### Get/update dependencies
1. Get/update composer
```bash
composer update
```
2. Get/update node dependencies
```bash
npm install
```

### Setup
1. Setup `.env`-File
* To do so, copy the file `.env.example` as `.env` in the same (root) folder
* open file `.env` to edit:
    * delete the value of `APP_KEY` in the first block like this:
    ```bash
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost
    ```
    * set your database values like this (here I am using no password for my local DB):
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_test
    DB_USERNAME=root
    DB_PASSWORD=
    ```
2. Run Migration
To get all tables created run all migrations. To do so just run
```bash
php artisan migrate
```
Get any further help here: https://laravel.com/docs/10.x/migrations

3. Run Seeder
To get some starting data just run
```bash
php artisan db:seed
```
Get any further help here: https://laravel.com/docs/10.x/seeding


### Run it!
1. Switch to `your branch` or at least to branch `develop`
2. Start server
```bash
php artisan serve
```
3. Start npm
```
npm run dev
```
4. Visit the link of laravel server NOT the link of npm!



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Getting started

### ⛽️ Install dependencies

#### Composer

Reinstall all composer packages and create the folder `vendor` if not present

```bash
composer install
```

#### NPM

Reinstall all npm packages and create the folder `node_modules` if not already present

```bash
npm ci
```

### 👨🏻‍💻 Development

For development you need to start the development task from npm

```bash
npm run dev
```

#### Laravel Valet

First install [Laravel Valet](https://laravel.com/docs/9.x/valet) global on your MacBook

Second: Link the project folder

```bash
valet link sybac-app
```

Open [http://sybac-app.test](http://sybac-app.test) and the project is running! 🚀

#### MAMP / XAMPP

> ⚠️ Not recommended

Start your server and call your localhost

#### Laravel Build-in-Server

This command start a server on [http://127.0.0.1:8000](http://127.0.0.1:8000)

```bash
php artisan serve
```


### 🏗 Build

These commands must be executed during deployment

```bash
# Composer stuff
composer install --no-interaction --prefer-dist --optimize-autoloader

# NPM-Stuff
npm ci
npm run build

## Lavravel-Stuff
php artisan migrate --force
```

