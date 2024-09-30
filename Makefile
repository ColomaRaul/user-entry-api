.PHONY: up bash stop
up:
	cd docker && docker-compose up

bash:
	cd docker && docker-compose exec php sh

stop:
	cd docker && docker-compose stop
