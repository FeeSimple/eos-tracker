#!/bin/bash

# Name must be eosio for running as block producer
name=trung
base_dir=~/nodeos_data
config_dir=.
data_dir=$base_dir/$name

mongo_opt='--delete-all-blocks --mongodb-wipe --abi-serializer-max-time-ms=1000'

nodeos --config-dir $config_dir --data-dir $data_dir $mongo_opt 
  
