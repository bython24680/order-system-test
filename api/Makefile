help:
	@echo "\033[1;31m!!Important!!\033[0m Please install the 'make' command, or use this command in a Linux-based system like Ubuntu.\n\n"
	@echo "Order system\n"
	@echo "\033[0;33mUsage:\033[0m\n  make [options]\n"
	@echo "\033[0;33mAvailable commands:"
	@echo "  \033[0;32mhelp\033[0m\t\tDisplay help and option lists for commands"
	@echo "  \033[0;32minit\033[0m\t\tInitialize this project"

init:
	composer install
	cp .env.example .env
	cp .env.testing.example .env.testing
	php artisan key:generate
	php artisan key:generate --env=testing
