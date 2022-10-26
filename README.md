

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

switch to app folder

    cd laravel-realworld-example-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Start the  database on .env file

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=perjalanan_dinas
    DB_USERNAME=root
    DB_PASSWORD=

Run the database migrations and sedd(**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start the local development server

    php artisan serve
    
at login

    role sdm        username:sdm
                    password:password
    role pegawai    username:winarno
                    password:password
                    username:pegawai
                    password:password
                 
