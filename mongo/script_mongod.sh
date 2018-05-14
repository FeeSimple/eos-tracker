#!/bin/bash

MONGODB_DIR=~/opt/mongodb

$MONGODB_DIR/bin/mongod -f $MONGODB_DIR/mongod.conf &
