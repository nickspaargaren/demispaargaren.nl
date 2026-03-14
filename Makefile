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

cs-check: ## Check code style
	docker compose exec app ./vendor/bin/php-cs-fixer check

cs-fix: ## Fix code style
	docker compose exec app ./vendor/bin/php-cs-fixer fix

security-test: ## Run SQL injection security test on login page
	sqlmap -u "http://localhost:8000/admin_cms/index.php" --data "username=test&password=test" --method POST --batch --risk 3 --level 5

nikto-scan: ## Run Nikto web server security scan
	docker run --rm --network host alpine/nikto:2.1.6 -h http://localhost:8000