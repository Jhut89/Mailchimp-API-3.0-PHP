#!/usr/bin/env bash

BOLD='\033[1m'
RED='\033[0;31m'
GREEN='\033[0;32'
NS='\033[0m'

echo -e "${GREEN}${BOLD}build script running${NS} \n"

# Update composer & Run PHP Unit tests
composer update && ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/

if [ "$TRAVIS_PULL_REQUEST" != "false" ]; then
    sudo chmod +x ./run_on_pull_requests.sh
    ./run_on_pull_requests.sh
fi