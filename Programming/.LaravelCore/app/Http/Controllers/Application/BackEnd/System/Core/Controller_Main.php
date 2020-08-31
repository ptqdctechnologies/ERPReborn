<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core
    {
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }
                
        public function setNotificationFailure($varData)
            {
            //try
                {                
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                $varAPI = [
                    'service' => 'core',
                    'class' => 'APIResponse', 
                    'subClass' => 'setNotificationFailure', 
                    'version' => 'latest'
                    ];
                //---> Method Call
                $varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPI, $varData);
                //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                return $varDataSend;
                }            
            }


        public function setNotificationSuccess($varData)
            {
            //try
                {                
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                $varAPI = [
                    'service' => 'core',
                    'class' => 'APIResponse', 
                    'subClass' => 'setNotificationSuccess', 
                    'version' => 'latest'
                    ];
                //---> Method Call
                $varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPI, $varData);
                //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                return $varDataSend;
                }            
            }
        }
    }