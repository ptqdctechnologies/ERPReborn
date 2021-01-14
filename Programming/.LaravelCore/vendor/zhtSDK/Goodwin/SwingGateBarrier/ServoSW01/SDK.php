<?php

namespace zhtSDK\Goodwin\SwingGateBarrier\ServoSW01
    {
    class zhtSDK
        {
        private $varSDKPath;

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-12                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
            {
            $this->varSDKPath = getcwd().'/../vendor/zhtSDK/Goodwin/SwingGateBarrier/ServoSW01';
            //$Obj = new com  COM("C:\docs\word.doc");
            echo "init";
            }
        }
    }