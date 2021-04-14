.PHONY: install tests

install:
	docker-compose build
	docker-compose up -d --remove-orphans
	docker-compose run --rm php /usr/local/bin/wait-for postgres:5432 -t 60
	docker-compose run --rm php composer install

tests:
	docker-compose run --rm php ./bin/tests
