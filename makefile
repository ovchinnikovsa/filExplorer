run:
	docker-compose up -d

up:
	docker-compose up

stop:
	docker-compose down

build:
	docker-compose build

clean:
	docker system prune -a --volumes

composer-install:
	docker-compose exec --user root app composer install

composer-autoload:
	docker-compose exec --user root app composer dump-autoload

composer-update:
	docker-compose exec --user root app composer update

generate-files:
	chmod +x ./docker/php/files_generator.sh
	./docker/php/files_generator.sh