#!/bin/bash

killall nodeos
killall mongod

rm -rf ~/nodeos_data
rm -rf ~/opt/mongodb/data/*
rm -rf ~/opt/mongodb/log/mongodb.log
