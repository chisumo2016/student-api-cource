#!/bin/sh
# Run This
    # chmod +x scripts/reset.sh
    # chmod +x scripts/install.sh
    # ../scripts/reset.sh

chmod u+x scripts/reset.sh

echo "\nResetting up project ...\n"

echo "\nClearing Cache ....\n"
php artisan clear
php artisan  config:clear
php artisan  cache:clear
php artisan  view:clear
php artisan route:clear

echo "\nDropping/recreating database ....\n"
php artisan migrate:fresh

echo "\nDone :)\n"
