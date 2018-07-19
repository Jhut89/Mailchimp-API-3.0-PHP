#!/usr/bin/env bash

# Run PHP Unit tests
composer update && ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/