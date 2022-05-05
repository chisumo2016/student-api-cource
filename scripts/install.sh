#!/bin/sh
# Run This
    # chmod +x scripts/reset.sh
    # chmod +x scripts/install.sh
    # ./scripts/install.sh

chmod u+x install.sh

PATH_BASE = "$(dirname "$0")/.."

echo "\nSetting up project ...\n"

echo "\nClearing Cache ....\n"
php artisan clear
php artisan  config:clear
php artisan  cache:clear
php artisan  view:clear
php artisan route:clear

echo "\nInstalling dependencies ... \n"

composer install --no-interaction
#npm install

# Create .env.tes if not exists
if [ -f "$PATH_BASE/.env" ]
then
    echo "\n.env file already exists.\n"
else
    echo "\Creating .env file.\n"
    cp .env.example .env
fi

echo "\nDone :)\n"



