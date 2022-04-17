PHP_FPM=php-fpm

up:
	docker-compose up --build -d

build:
	docker-compose build --no-cache

start: build c-install up

c-install:
	docker-compose run $(PHP_FPM) composer install --ansi --prefer-dist

.PHONY: up