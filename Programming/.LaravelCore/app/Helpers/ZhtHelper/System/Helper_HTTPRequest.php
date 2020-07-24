<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System
    {
    class Helper_HTTPRequest
        {
        public static function setRequest($varUserSession, $varURL, $varMethod, $varPort=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Set HTTP Request');
                try {
                    //---> Cek apakah port tujuan terbuka
                    if (\App\Helpers\ZhtHelper\General\Helper_Network::isPortOpen($varUserSession, $varURL, $varPort)==false)
                        {
                        throw new \Exception("Port is closed");
                        }
                    //---> Main process
                    
                    
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'failed, '. $ex->getMessage());
                    }               
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        public static function getEncryptedURLParameter(array $varDataArray)
            {
            //echo "<br>".$_SERVER['REQUEST_TIME']."<br>";
            echo \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ();
            //echo "<br>".$_SERVER['REQUEST_TIME']."<br>";
            }

            
        public static function getURLDecapsulation($varUserSession, $varEncapsulatedData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get URL decapsulation');
                try {
                    $varData = 
                        \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibDecompress(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64DecodeWithoutSlashCharacter(
                                $varUserSession, 
                                $varEncapsulatedData
                                )
                            )
                            ;
                    var_dump($varData);
                    $varDataArrayTemp = explode('/', $varData);
                    echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
                    var_dump($varDataArrayTemp);
                    $varStoredHash = $varDataArrayTemp[0];
                    array_shift($varDataArrayTemp);

                    echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
                    var_dump($varDataArrayTemp);
                    $varData = implode('/', $varDataArrayTemp);

                    echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
                    $varCheckedHash = self::getURLEncapsulationShadow($varUserSession, $varData);

                    if(strcmp($varStoredHash, $varCheckedHash)==0)
                        {
                        echo "HASHING SUKSES";
                        }
                    else {
                        throw new \Exception('Invalid shadow');
                        }

                    $varReturn = $varData;
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'Failed, '.$ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        public static function getURLEncapsulation($varUserSession, $varData, $varTTLInSeconds=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                try {
                    if(!$varTTLInSeconds)
                        {
                        $varTTLInSeconds = 10;
                        }
                    $varSeeder=\App\Helpers\ZhtHelper\General\Helper_Encode::getBase64EncodeWithoutSlashCharacter(000000, random_bytes(6));
                    echo "<br>".$varSeeder;
                    $varExpiredTime = (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime()+$varTTLInSeconds);
                    $varData = $varSeeder.'/'.$varExpiredTime.'/'.$varData;
                    $varData = self::getURLEncapsulationShadow($varUserSession, $varData).'/'.$varData;
                    echo "<br><br>".$varData;

                    $varCipherMode = 'AES-128-CTR';
                    $varEncryptionKey = 'Kunci Enkripsiku'; 
                    $varOptions = 0; 
                    $varInitialVector = '1234567891011121';
                    $varReturn =
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64EncodeWithoutSlashCharacter(
                            $varUserSession,    
                            \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibCompress(
                                $varUserSession, 
                                $varData
                                )
                            );
                    echo "<br> Normal : ".strlen($varData);
                    echo "<br> Full Encap : ".strlen($varReturn);
                    } 
                catch (\Exception $ex) {
                    }
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
            
        private static function getURLEncapsulationShadow($varUserSession, $varData, $varDataSeparator=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                try {
                    if(!$varDataSeparator)
                        {
                        $varDataSeparator='[DataSeparator]';
                        }
                    $varDataArrayTemp = explode('/', $varData);
                    $varHashData='';
                    for($i=0; $i!=count($varDataArrayTemp); $i++)
                        {
                        if($i!=0)
                            {
                            $varHashData.=$varDataSeparator;
                            }
                        $varHashData.=$varDataArrayTemp[$i];
                        $varHashData=\App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(00000, $varHashData);
                        //echo '<br>'.$varHashData;
                        }
                    $varReturn = $varHashData;                    
                    } 
                catch (\Exception $ex) {
                    }
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }