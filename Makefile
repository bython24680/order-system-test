help:
	@echo "\033[1;31m!!Important!!\033[0m Please install the 'make' command, or use this command in a Linux-based system like Ubuntu.\n\n"
	@echo "Order system\n"
	@echo "\033[0;33mUsage:\033[0m\n  make [options]\n"
	@echo "\033[0;33mAvailable commands:"
	@echo "  \033[0;32mhelp\033[0m\t\tDisplay help and option lists for commands"
	@echo "  \033[0;32minit\033[0m\t\tInitialize this project in the api directory"
	@echo "\n\033[0;33mOthers:\033[0m"
	@echo "  \033[0;32mclear-local-dev\033[0m\t\tClear folder local-dev"


# Local dev
FOLDER_LOCAL_DEV=./local-dev

init:
	@echo "Initial project..."
	@if [[ ! -d "$(FOLDER_LOCAL_DEV)" ]]; then \
		mkdir $(FOLDER_LOCAL_DEV); \
	fi
	cd ./api && make init


# Others

clear-local-dev:
	@echo "Regenerate folder $(FOLDER_LOCAL_DEV)..."
	@if [[ -d "$(FOLDER_LOCAL_DEV)" ]]; then \
		rmdir $(FOLDER_LOCAL_DEV); \
	fi
	mkdir $(FOLDER_LOCAL_DEV)
