./cleanup.sh

NODEOS='/root/eos-mysql/build/programs/nodeos/nodeos'

$NODEOS --genesis-json genesis.json --config-dir . --data-dir . \
--plugin eosio::chain_api_plugin \ 
--plugin eosio::sql_db_plugin --sql_db-uri="mysql://db=eos user=root password=feesimple host=127.0.0.1" \
