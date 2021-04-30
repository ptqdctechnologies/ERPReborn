#!/bin/bash

varHostIP="192.168.0.7";
varUserName="IT";
varPassword="qdct3ch";
varPathDestination="/zhtConf/tmp/download/SwingGateBarrier.mdb";

clear;
#sshpass -p $varPassword scp -T $varUserName@$varHostIP:'"C:\Program Files (x86)\ZKTeco\ZKAccess3.5\Access.mdb"' $varPathDestination;
sshpass -p $varPassword scp -T -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no $varUserName@$varHostIP:'"C:\Program Files (x86)\ZKTeco\ZKAccess3.5\Access.mdb"' $varPathDestination;
