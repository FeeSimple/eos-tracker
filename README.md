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

    pm2 start script_nodeos_producer_mongo.sh

## eos-tracker-api

https://github.com/EOSEssentials/EOSTracker-API

EOS Tracker API is a PHP Backend based on Symfony3 that connects to a MongoDB database.

First, install the below dependencies:

PHP 7.2:

    sudo add-apt-repository ppa:ondrej/php
    sudo apt-get update
    sudo apt-get install php7.2-cli

Others:

    sudo apt-get install php-mongodb
    sudo apt-get install php7.2-cli
    sudo apt-get install php7.2-xml
    apt-get install composer

Then, follows its README for "Installation" and "Usage"

To start:

    php bin/console server:run

Config file of MongDB for eos-tracker-api

    app/config/parameters.yml

    # This file is auto-generated during the composer install parameters:
    secret: 123
    mongodb_server: 'mongodb://localhost:27017'
    db_name: EOStest


## eos-tracker-frontend

https://github.com/EOSEssentials/EOSTracker

EOS Tracker is a Frontend based on Angular4 that connects to EOS Tracker API.

Just follow its README for installation and execution

To start the frontend at specific IP:Port

    ng serve --host 0.0.0.0 --port 4200
