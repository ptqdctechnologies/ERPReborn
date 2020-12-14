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
    use Illuminate\Http\Request;


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Environment                                                                                           |
    | ▪ Description : Menangani segala parameter yang terkait Environment                                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Environment
        {
        private static $varNameSpace;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
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
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Description     : System's Default Destructor                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __destruct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init()
            {
            self::$varNameSpace=get_class();
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationID                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data Application ID                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationID()
            {
            $varReturn = 'ERPReborn';
            return $varReturn;
            }

        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationDateTimeTZ                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data waktu sekarang                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationDateTimeTZ()
            {
            date_default_timezone_set('Asia/Jakarta');
            $varDate = date_create(null, timezone_open('Asia/Jakarta'));

            $varMicroDate = microtime();
            $varDateArray = explode(" ", $varMicroDate);
            $varMicroSecond = substr($varDateArray[1], 0, 6);
            
            $varTimeZoneOffset = str_pad((($varDate->getOffset())/3600), 2, '0', STR_PAD_LEFT);
                        
            $varReturn = date("Y-m-d H:i:s.", time()).$varMicroSecond.'+'.$varTimeZoneOffset;
            
            //$varUnixTime = (int) file_get_contents((stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://').'localhost/getJSUnixTime');
            //$varReturn = date("Y-m-d H:i:s.", $varUnixTime).$varMicroSecond.'+'.$varTimeZoneOffset;

            return $varReturn;
            }


        public static function setApplicationUserRolePrivilegesMenu($varUserSession, int $varUserRoleID, int $varBranchID)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Application User Role Privileges Menu');
                try {
                    $varBufferDB = (new \App\Models\Database\SchSysConfig\General())->getMenuByUserRoleIDAndBranchID($varUserSession, 95000000000003, 11000000000004);
                    
                    $varDataReturn = [];
                    
                    for($i=0; $i!=(count($varBufferDB)); $i++)
                        {                       
                        $varDataCode = explode('.', str_replace('<ACT>', '.', substr($varBufferDB[$i]['Code'], 1, strlen($varBufferDB[$i]['Code']))));                       

                        switch(count($varDataCode))
                            {
                            case 1:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => ((bool)$varBufferDB[$i]['CallAction'])
                                        ];
                                break;
                            case 2:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 3:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 4:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 5:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 6:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 7:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]]
                                    ['Child'][$varDataCode[6]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 8:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]]
                                    ['Child'][$varDataCode[6]]
                                    ['Child'][$varDataCode[7]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 9:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]]
                                    ['Child'][$varDataCode[6]]
                                    ['Child'][$varDataCode[7]]
                                    ['Child'][$varDataCode[8]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 10:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]]
                                    ['Child'][$varDataCode[6]]
                                    ['Child'][$varDataCode[7]]
                                    ['Child'][$varDataCode[8]]
                                    ['Child'][$varDataCode[9]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 11:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]]
                                    ['Child'][$varDataCode[6]]
                                    ['Child'][$varDataCode[7]]
                                    ['Child'][$varDataCode[8]]
                                    ['Child'][$varDataCode[9]]
                                    ['Child'][$varDataCode[10]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            case 12:
                                $varDataReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]]
                                    ['Child'][$varDataCode[6]]
                                    ['Child'][$varDataCode[7]]
                                    ['Child'][$varDataCode[8]]
                                    ['Child'][$varDataCode[9]]
                                    ['Child'][$varDataCode[10]]
                                    ['Child'][$varDataCode[11]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction']
                                        ];
                                break;
                            default:
                                echo '';
                            }
                        }
                        
                    
                        
                    //
                    
                    self::setApplicationUserRolePrivilegesMenuSimplification($varUserSession, $varDataReturn);
                    
                    dd($varDataReturn);
                    
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);            
            }

            
private static function setApplicationUserRolePrivilegesMenuSimplification($varUserSession, $varData)
    {
    //for($i=0; $i!=count($varData['Child']); $i++)
    //    {
    //    echo 
    //    //$varReturn
    //    }
    
    //var_dump($varData);
    //foreach($varData as $val) {
    //    echo $val."<br>";
    //    }
    
    $age = $varData['Child'];
//    foreach($age as $x => $val) {
  //      echo "$x = $val<br>";
    //    }
    }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBackEndConfigEnvironment                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-05                                                                                           |
        | ▪ Description     : Mencari nilai Konfigurasi Environment Back End sesuai Kunci Parameter (varKey)                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBackEndConfigEnvironment($varUserSession, $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Back End Configuration Environment');
                try {
                    $varReturn=self::getConfigEnvironment($varUserSession, $varKey, '/config/Application/BackEnd/environment.txt');
                    if(is_numeric($varReturn)==true)
                        {
                        $varReturn = $varReturn*1;
                        }
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFrontEndConfigEnvironment                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-06                                                                                           |
        | ▪ Description     : Mencari nilai Konfigurasi Environment Front End sesuai Kunci Parameter (varKey)                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFrontEndConfigEnvironment($varUserSession, $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Back End Configuration Environment');
                try {
                    $varReturn=self::getConfigEnvironment($varUserSession, $varKey, '/config/Application/FrontEnd/environment.txt');
                    if(is_numeric($varReturn)==true)
                        {
                        $varReturn = $varReturn*1;
                        }
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getConfigEnvironment                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-05                                                                                           |
        | ▪ Description     : Mencari nilai Konfigurasi Environment pada file tertentu (varPostfix) sesuai Kunci Parameter         |
        |                     (varKey)                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        |      ▪ (string) varPostfix ► Path nama file                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getConfigEnvironment($varUserSession, string $varKey, string $varPostfix)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Configuration Environment');
                try {
                    $varFileContent = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent($varUserSession, 
                        \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd().'/', $varPostfix)
                        );
                    $varArrayTemp=explode("\n", $varFileContent);
                    for($i=0; $i!=count($varArrayTemp); $i++)
                        {
                        if(strlen($varArrayTemp[$i])>0)
                            {
                            $varArrayTemp2=explode("=", $varArrayTemp[$i]);
                            $varValue=$varArrayTemp2;
                            array_shift($varValue);
                            $varValue=implode("=", $varValue);
                            $varData[$varArrayTemp2[0]]=$varValue;
                            }
                        }
                    if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, $varKey, $varData)==true)
                        { 
                        $varReturn=$varData[$varKey];
                        }
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLaravelEnvironmentOLD                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mencari nilai dari parameter environment Laravel (.env)                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getLaravelEnvironmentOLD($varKey)
            {
            $varUserSession=000000;
            $varFileContent = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent($varUserSession, 
                    \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchSystemFilePath(getcwd(), '.env')
                    //\App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '.env')
                    );
            $varArrayTemp=explode("\n", $varFileContent);
            for($i=0; $i!=count($varArrayTemp); $i++)
                {
                if(strlen($varArrayTemp[$i])>0)
                    {
                    $varArrayTemp2=explode("=", $varArrayTemp[$i]);
                    $varData[$varArrayTemp2[0]]=$varArrayTemp2[1];
                    }
                }
            $varReturn=$varData[$varKey];
            return $varReturn;
            }

        public static function getLaravelEnvironment($varKey)
            {
            $varUserSession=000000;
            $varFileContent = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent($varUserSession, 
                    //\App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchSystemFilePath(getcwd(), '.env')
                    \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '.env')
                    );
            $varArrayTemp=explode("\n", $varFileContent);
            for($i=0; $i!=count($varArrayTemp); $i++)
                {
                if(strlen($varArrayTemp[$i])>0)
                    {
                    $varArrayTemp2=explode("=", $varArrayTemp[$i]);
                    $varData[$varArrayTemp2[0]]=$varArrayTemp2[1];
                    }
                }
            $varReturn=$varData[$varKey];
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserSessionID_System                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-11                                                                                           |
        | ▪ Description     : Mencari User Session ID of System                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUserSessionID_System()
            {
            $varReturn=null;
            
            try {
                if(is_file(getcwd().'/./../../.LaravelCore/config/Application/BackEnd/environment.txt')==true)
                    {$varPathFile=getcwd().'/./../../.LaravelCore/config/Application/BackEnd/environment.txt';}
                elseif(is_file(getcwd().'/./../../../.LaravelCore/config/Application/BackEnd/environment.txt')==true)
                    {$varPathFile=getcwd().'/./../../../.LaravelCore/config/Application/BackEnd/environment.txt';}
                elseif(is_file(getcwd().'/./../../../../.LaravelCore/config/Application/BackEnd/environment.txt')==true)
                    {$varPathFile=getcwd().'/./../../../../.LaravelCore/config/Application/BackEnd/environment.txt';}
                $varFileContent = file_get_contents($varPathFile);
                $varArrayTemp=explode("\n", $varFileContent);
                for($i=0; $i!=count($varArrayTemp); $i++)
                    {
                    if(strlen($varArrayTemp[$i])>0)
                        {
                        $varArrayTemp2=explode("=", $varArrayTemp[$i]);
                        $varValue=$varArrayTemp2;
                        array_shift($varValue);
                        $varValue=implode("=", $varValue);
                        $varData[$varArrayTemp2[0]]=$varValue;
                        }
                    }
                $varReturn=(int) $varData['USER_SESSION_ID_SYSTEM'];                
                } 
            catch (\Exception $ex) {
                }
            return $varReturn;
            }
        }
    }

?>
