help:
	@echo "\033[1;31m!!Important!!\033[0m Please install the 'make' command, or use this command in a Linux-based system like Ubuntu.\n\n"
	@echo "Order system\n"
	@echo "\033[0;33mUsage:\033[0m\n  make [options]\n"
	@echo "\033[0;33mAvailable commands:"
	@echo "  \033[0;32mhelp\033[0m\t\t\t\t\t\tDisplay help and option lists for commands"
	@echo "  \033[0;32minit\033[0m\t\t\t\t\t\tInitialize this project in the api directory"
	@echo "\n\n\033[0;33mAvailable commands for local developement docker container services:\033[0m"
	@echo "  \033[0;32mserve [OPTION=option]\033[0m\t\t\t\tActivate docker services for local development.\n\t\t\t\t\t\tUse OPTION=option to pass optional argument to docker compose command. For example, OPTION=--build"
	@echo "  \033[0;32mserve-status\033[0m\t\t\t\t\tShow docker services status"
	@echo "  \033[0;32mserve-start\033[0m\t\t\t\t\tStart docker services"
	@echo "  \033[0;32mserve-stop\033[0m\t\t\t\t\tStop docker services"
	@echo "  \033[0;32mserve-remove\033[0m\t\t\t\t\tRemove docker services. Please stop them before remove them"
	@echo "  \033[0;32mserve-logs\033[0m\t\t\t\t\tShow logs of docker services"
	@echo "  \033[0;32mserve-restart SERVICE=[service_name]\033[0m\t\tRestart docker service by their name"
	@echo "\n\033[0;33mOthers:\033[0m"
	@echo "  \033[0;32mclear-local-dev\033[0m\t\t\t\tClear folder local-dev"


# Local dev
FOLDER_LOCAL_DEV=./local-dev

init:
	@echo "Initial project..."
	@if [[ ! -d "$(FOLDER_LOCAL_DEV)" ]]; then \
		mkdir $(FOLDER_LOCAL_DEV); \
	fi
	cd ./api && make init

# Docker compose
DOCKER_COMPOSE=./docker/local/docker-compose.yaml
OPTION=
serve:
	@echo "\033[0;33mActive local services...\033[0m\n"
	sudo docker compose -f $(DOCKER_COMPOSE) up -d $(OPTION)
	@echo "\nPlease access these service in:\n"
	@echo "- API: http://0.0.0.0:8020"
	@echo "- PostgreSQL: http://0.0.0.0:5442"
	@echo "- PostgreSQL for testing: http://0.0.0.0:5443"

serve-status:
	sudo docker compose -f $(DOCKER_COMPOSE) ps

serve-start:
	@echo "\033[0;33mStart local services...\033[0m"
	sudo docker compose -f $(DOCKER_COMPOSE) start

serve-stop:
	@echo "\033[0;33mStop local services...\033[0m\n"
	sudo docker compose -f $(DOCKER_COMPOSE) stop

serve-remove:
	@echo "\033[0;33mRemove local services...\033[0m\n"
	sudo docker compose -f $(DOCKER_COMPOSE) rm

serve-logs:
	sudo docker compose -f $(DOCKER_COMPOSE) logs

SERVICE=
serve-restart:
	@if  [[ -z "$(SERVICE)" ]]; then \
		echo "Service name is empty. Abort"; \
		exit 1; \
	fi
	sudo docker compose -f $(DOCKER_COMPOSE) restart $(SERVICE)

# Others

clear-local-dev:
	@echo "Regenerate folder $(FOLDER_LOCAL_DEV)..."
	@if [[ -d "$(FOLDER_LOCAL_DEV)" ]]; then \
		rm -rf $(FOLDER_LOCAL_DEV)/*; \
		rmdir $(FOLDER_LOCAL_DEV); \
	fi
	mkdir $(FOLDER_LOCAL_DEV)
