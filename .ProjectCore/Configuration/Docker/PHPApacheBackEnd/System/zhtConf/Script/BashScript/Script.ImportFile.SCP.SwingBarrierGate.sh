#!/bin/bash

touch /zhtConf/log/lastSession/cron.d/Script.ImportFile.SCP.SwingBarrierGate.sh;

varCommand="scp -T -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no";
varHostIP="192.168.0.7";
varUserName="IT";
varUserName="qdcadmin";
varPassword="qdct3ch";
varPassword="qu1d151t3chn0";
varPathDestination="/zhtConf/tmp/download/SwingBarrierGate.mdb";

clear;
#sshpass -p $varPassword scp -T $varUserName@$varHostIP:'"C:\Program Files (x86)\ZKTeco\ZKAccess3.5\Access.mdb"' $varPathDestination;
#sshpass -p $varPassword scp -T -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no $varUserName@$varHostIP:'"C:\Program Files (x86)\ZKTeco\ZKAccess3.5\Access.mdb"' $varPathDestination;
sshpass -p $varPassword $varCommand $varUserName@$varHostIP:'"C:\Program Files (x86)\ZKTeco\ZKAccess3.5\Access.mdb"' $varPathDestination;
