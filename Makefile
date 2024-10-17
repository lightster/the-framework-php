.PHONY: install tests

install:
	docker-compose build
	docker-compose up -d --remove-orphans
	docker-compose run --rm php8.0 /usr/local/bin/wait-for postgres:5432 -t 60
	docker-compose run --rm php8.0 composer install

tests:
	docker-compose run --rm php8.0 ./bin/tests
	docker-compose run --rm php8.1 ./bin/tests
	docker-compose run --rm php8.2 ./bin/tests
	docker-compose run --rm php8.3 ./bin/tests
