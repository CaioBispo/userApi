setup:
	docker-compose pull
	docker-compose build
	cp .env.example .env
	make database
	docker-compose up -d

database:
	docker-compose up -d database
	docker-compose up -d app
	docker-compose run --rm app composer install
	docker-compose run --rm app chmod -R 777 storage .env
	docker-compose run --rm app php artisan migrate --seed

php:
	@docker-compose exec app bash

restart:
	@docker-compose restart

build:
	@docker-compose build

stop:
	@docker-compose stop
