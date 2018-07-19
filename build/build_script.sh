#!/usr/bin/env bash

# Update composer & Run PHP Unit tests
sudo composer update && ../vendor/bin/phpunit --bootstrap vendor/autoload.php tests/