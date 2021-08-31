#!/bin/bash
cd quotes-backend
chown -R www-data:www-data ./storage ./bootstrap
cp .env.example .env
docker run --rm -it -v $PWD:/app composer install
docker-compose up --build -d
