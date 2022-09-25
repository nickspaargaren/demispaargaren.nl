info: 
	@egrep '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) |  awk 'BEGIN {FS = ":.*?## "}; {printf "\033[33m%-15s\033[0m %s\n", $$1, $$2}'

start: ## Start local development
	make copy-env
	make install
	make run

copy-env:
	@if ! [[ -f .env ]]; then\
			cp .env.example .env;\
	fi

install:
	composer install

run:
	docker-compose up