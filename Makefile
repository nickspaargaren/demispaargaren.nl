info: 
	@egrep '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) |  awk 'BEGIN {FS = ":.*?## "}; {printf "\033[33m%-15s\033[0m %s\n", $$1, $$2}'

copy-env:
	@if ! [[ -f .env ]]; then\
			cp .env.example .env;\
	fi

install: ## Install local development
	make copy-env
	docker compose build

start: ## Start local development
	docker compose up

shell:
	docker compose exec -it app sh