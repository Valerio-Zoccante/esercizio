#!/bin/sh
set -e

# Get Laravel source
git clone https://github.com/laravel/laravel.git

cp -r ./laravel/ ./

rm -rf ./laravel

composer install

cp .env.example .env

php artisan key:generate

docker-compose up --force-recreate --build -d

echo "Done!"
echo "Open http://localhost:8080 in your browser. Good luck with your code challenge"
