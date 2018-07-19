#!/usr/bin/env bash

echo "build script running"

# Update composer & Run PHP Unit tests
composer update && ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/