<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
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

# Note Application

A simple Laravel application to create and manage notes.

## Features
- Create, edit, and delete notes.   
- User authentication.
- Real-time UI updates with Livewire.

## Installation

### Prerequisites
- PHP 8+
- Composer
- Laravel 11
- PostgreSQL/MySQL (configured in `.env`)

### Setup
1. **Clone the repository:**
   ```sh
   git clone https://github.com/swaffufu/noteapp.git
   cd notapp
   ```
2. **Install dependencies:**
   ```sh
   composer install
   ```
3. **Configure `.env` fil:**

   - Set database credentials in `.env`:
     ```env
     DB_CONNECTION=pgsql
     DB_HOST=127.0.0.1
     DB_PORT=5432
     DB_DATABASE=note_app
     DB_USERNAME=your-username
     DB_PASSWORD=your-password
     ```
4. **Run migrations:**
   ```sh
   php artisan migrate
   ```
5. **Start the development server:**
   ```sh
   php artisan serve
   ```

## Usage
- Register/Login to start adding notes.
- Notes are displayed in real-time using Livewire.
- Click edit/delete to modify your notes.


## Contributing
Feel free to fork and submit a pull request!

## License
MIT License



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
