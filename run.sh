#!/bin/bash

# Install PHP if it isn't installed.
if hash php 2> /dev/null; then
    echo "Application dependency found."
else
    sudo apt-get update -y && sudo apt-get upgrade -y
    sudo apt-get install php7.3 php7.3-cli php7.3-sqlite3 php7.3-simplexml
fi

# Check that php7.3-sqlite3 is installed.
php -r "if (extension_loaded('sqlite3') === false) throw new Exception('');" 2> /dev/null || sudo apt-get install php7.3-sqlite3

# Run the application.
echo 'Running application.'
php app.phar
