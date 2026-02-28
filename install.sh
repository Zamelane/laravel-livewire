#!/bin/bash
cp .env.example .env
touch database/database.sqlite
composer install
npm i
php artisan key:generate
php artisan migrate --seed
