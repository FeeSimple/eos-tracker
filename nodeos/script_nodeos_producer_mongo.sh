#!/bin/bash

# Name must be eosio for running as block producer
name=tttmongo
base_dir=~/nodeos_data
config_dir=.
data_dir=$base_dir/$name

nodeos -e -p $name --config-dir $config_dir --data-dir $data_dir \
  --resync-blockchain --plugin eosio::mongo_db_plugin \
  --mongodb-uri mongodb://localhost:27017/EOStest
