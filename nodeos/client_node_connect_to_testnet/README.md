# Client nodeos connects to testnet

## Testnet

The running testnet (on server `159.65.109.118`) includes 10 block producers
which are in turn producing blocks.

Instruction for deploying testnet is described here:
`https://github.com/FeeSimple/bios_boot_script`

## Build nodeos

Instruction is described here:
`https://github.com/EOSIO/eos/wiki/Local-Environment#2-building-eosio`

Current build version:
`master branch at commit a97a49a0dd4f5051dc7de1de4bc654fedf49cadf`

## Start a client nodeos connected to the testnet

Download the prepared script together with config.ini and genesis.ini files
from:

`https://github.com/FeeSimple/eos-tracker/tree/master/nodeos/client_node_connect_to_testnet`

Run in background with pm2 tool: `pm2 start script_client_nodeos.sh`

Or run in foreground: `./script_client_nodeos.sh`

Optionally, we can change some configuration values in `config.ini`:

```
http-server-address = 127.0.0.1:8877
p2p-listen-endpoint = 0.0.0.0:9888
```

## Check the client nodeos

Open up web browser and type:
`http://localhost:8877/v1/chain/get_info`

The output looks like:

```
{"server_version":"cbf28a23","chain_id":"1c6ae7719a2a3b4ecb19584a30ff510ba1b6ded86e1fd8b8fc22f1179c622a32","head_block_num":232,"last_irreversible_block_num":178,"last_irreversible_block_id":"000000b297f025e337e8abd1379a775ddec2ea9f86589c73a775a602d9703262","head_block_id":"000000e8d66c0717661863c3108a2d0bbcdfe0c64599b328b5c6985cbdad23bb","head_block_time":"2018-06-05T12:20:15","head_block_producer":"producer111e","virtual_block_cpu_limit":251872,"virtual_block_net_limit":1321080,"block_cpu_limit":99900,"block_net_limit":1048576}
```

Whenever we refresh the web browser, we see that the `head_block_producer` changes.
This indicates that the block producers take their turns to produce blocks
