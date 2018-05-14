#!/bin/bash

killall mongod

rm -rf ~/opt/mongodb/data/*
rm -rf ~/opt/mongodb/log/mongodb.log
