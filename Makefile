info: 
	@egrep '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) |  awk 'BEGIN {FS = ":.*?## "}; {printf "\033[33m%-15s\033[0m %s\n", $$1, $$2}'

copy-env:
	@if ! [[ -f .env ]]; then\
			cp .env.example .env;\
	fi

install: ## Install local development
	make copy-env
	ddev start
	ddev composer install
	ddev import-db --database=nickspaarg_demi --file=development/database.sql

start: ## Start local development
	ddev start
	ddev describe

stop: ## Stop local development
	ddev poweroff

delete: ## Delete local development
	ddev delete

shell: ## Open a shell in the container
	ddev ssh