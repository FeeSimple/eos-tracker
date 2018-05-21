# EOS tracker tool

EOS tracker tool is made up of the following things:

    eos-tracker-frontend <--> eos-tracker-api <--> mongodb <--> nodeos

## Mongodb

By default on Ubuntu, mongodb is compiled and built as plugin of nodeos.
To determine if mongodb is supported by nodeos, run the following cmd and
check if "--mongodb-uri" option available

Installation dir of mongodb:
    ~/opt/mongodb

Config file of mongodb:

    ~/opt/mongodb/mongod.conf

Command to start mongod (MongoDB daemon):

    ~/opt/mongodb/bin/mongod -f ~/opt/mongodb/mongod.conf &


Or run the provided script "script_mongod.sh" in the folder "mongo"

View log output of mongod:

    tail -f ~/opt/mongodb/log/mongodb.log

By default, mongod is listenning at localhost:27017

## nodeos

Start nodeos (EOS daemon) with connection to mongodb named "EOStest"
by running the following cmd:

    cd nodeos

    pm2 start client_node_connect_to_testnet_mongo/script_client_node_mongo.sh
    or:
    pm2 start single_eosio_producer_mongo/script_eosio_producer_mongo.sh

## eos-tracker-api

https://github.com/EOSEssentials/EOSTracker-API

EOS Tracker API is a PHP Backend based on Symfony3 that connects to a MongoDB database.

First, install the below dependencies:

PHP 7.2:

    sudo add-apt-repository ppa:ondrej/php
    sudo apt-get update
    sudo apt-get install php7.2

Others:

    sudo apt-get install php-mongodb
    sudo apt-get install php7.2-cli
    sudo apt-get install php7.2-xml
    apt-get install composer

Then, follows its README for "Installation" and "Usage"

    composer update
    composer install

Config file of MongDB for eos-tracker-api

    app/config/parameters.yml

    # This file is auto-generated during the composer install parameters:
    secret: 123
    mongodb_server: 'mongodb://localhost:27017'
    db_name: EOStest

To start:

    php bin/console server:run

Or run this cmd:

    pm2 start script_tracker_api.sh


## eos-tracker-frontend

https://github.com/EOSEssentials/EOSTracker

EOS Tracker is a Frontend based on Angular4 that connects to EOS Tracker API.

Config file of eos-tracker-frontend for interacting with eos-tracker-api:

    src/environments/environment.ts

        export const environment = {
            production: false,
            walletUrl: '//walleteos.com',
            appName: 'EOS Tracker',
            logoUrl: '/assets/logo.png',
            apiUrl: '//159.65.109.118:8000',
            blockchainUrl: '//159.65.109.118:8877'
        };

Just follow its README for installation and execution

If not available, then install the following things:

    npm install -g @angular/cli
    npm install -g npm

To start the frontend at specific IP:Port

    ng serve --host 0.0.0.0 --port 4200

    or run the below cmd:
    pm2 start script_run_frontend.sh

## eos-tracker-api dependencies

composer install
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 36 installs, 0 updates, 0 removals
  - Installing mongodb/mongodb (1.3.2): Downloading (100%)         
  - Installing alcaeus/mongo-php-adapter (1.1.5): Downloading (100%)         
  - Installing symfony/polyfill-mbstring (v1.8.0): Downloading (100%)         
  - Installing twig/twig (v2.4.8): Downloading (100%)         
  - Installing paragonie/random_compat (v2.0.12): Downloading (100%)         
  - Installing symfony/polyfill-php70 (v1.8.0): Downloading (100%)         
  - Installing symfony/polyfill-util (v1.8.0): Downloading (100%)         
  - Installing symfony/polyfill-php56 (v1.8.0): Downloading (100%)         
  - Installing symfony/symfony (v3.4.9): Downloading (100%)         
  - Installing symfony/polyfill-intl-icu (v1.8.0): Downloading (100%)         
  - Installing symfony/polyfill-apcu (v1.8.0): Downloading (100%)         
  - Installing psr/simple-cache (1.0.1): Downloading (100%)         
  - Installing psr/log (1.0.2): Downloading (100%)         
  - Installing psr/link (1.0.0): Downloading (100%)         
  - Installing psr/container (1.0.0): Downloading (100%)         
  - Installing psr/cache (1.0.1): Downloading (100%)         
  - Installing fig/link-util (1.0.0): Downloading (100%)         
  - Installing doctrine/lexer (v1.0.1): Downloading (100%)         
  - Installing doctrine/inflector (v1.3.0): Downloading (100%)         
  - Installing doctrine/collections (v1.5.0): Downloading (100%)         
  - Installing doctrine/cache (v1.7.1): Downloading (100%)         
  - Installing doctrine/annotations (v1.6.0): Downloading (100%)         
  - Installing doctrine/common (v2.8.1): Downloading (100%)         
  - Installing incenteev/composer-parameter-handler (v2.1.3): Downloading (100%)         
  - Installing nelmio/cors-bundle (1.5.4): Downloading (100%)         
  - Installing composer/ca-bundle (1.1.1): Downloading (100%)         
  - Installing sensiolabs/security-checker (v4.1.8): Downloading (100%)         
  - Installing sensio/distribution-bundle (v5.0.21): Downloading (100%)         
  - Installing sensio/framework-extra-bundle (v5.1.6): Downloading (100%)         
  - Installing symfony/apache-pack (v1.0.1): Downloading (100%)         
  - Installing monolog/monolog (1.23.0): Downloading (100%)         
  - Installing symfony/monolog-bundle (v3.2.0): Downloading (100%)         
  - Installing swiftmailer/swiftmailer (v5.4.9): Downloading (100%)         
  - Installing symfony/swiftmailer-bundle (v2.6.7): Downloading (100%)         
  - Installing sensio/generator-bundle (v3.1.7): Downloading (100%)         
  - Installing symfony/phpunit-bridge (v3.4.9): Downloading (100%)         
symfony/polyfill-mbstring suggests installing ext-mbstring (For best performance)
paragonie/random_compat suggests installing ext-libsodium (Provides a modern crypto API that can be used to generate random bytes.)
symfony/polyfill-intl-icu suggests installing ext-intl (For best performance)
sensio/framework-extra-bundle suggests installing symfony/psr-http-message-bridge (To use the PSR-7 converters)
monolog/monolog suggests installing aws/aws-sdk-php (Allow sending log messages to AWS services like DynamoDB)
monolog/monolog suggests installing doctrine/couchdb (Allow sending log messages to a CouchDB server)
monolog/monolog suggests installing ext-amqp (Allow sending log messages to an AMQP server (1.0+ required))
monolog/monolog suggests installing graylog2/gelf-php (Allow sending log messages to a GrayLog2 server)
monolog/monolog suggests installing php-amqplib/php-amqplib (Allow sending log messages to an AMQP server using php-amqplib)
monolog/monolog suggests installing php-console/php-console (Allow sending log messages to Google Chrome)
monolog/monolog suggests installing rollbar/rollbar (Allow sending log messages to Rollbar)
monolog/monolog suggests installing ruflin/elastica (Allow sending log messages to an Elastic Search server)
monolog/monolog suggests installing sentry/sentry (Allow sending log messages to a Sentry server)
symfony/phpunit-bridge suggests installing ext-zip (Zip support is required when using bin/simple-phpunit)
Writing lock file
Generating autoload files
