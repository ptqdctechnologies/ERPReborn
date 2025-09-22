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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationUserSession_AllData                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-22                                                                                           |
        | ▪ Creation Date   : 2025-09-22                                                                                           |
        | ▪ Description     : Mendapatkan Data Sesi Aplkasi Pengguna - Semua Data Pengguna                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varUserID ► User ID                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationUserSession_AllData($varUserSession)
            {
            try {
                $varReturn = (
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                       $varUserSession,
                       \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                           $varUserSession,
                           'ERPReborn::APIWebToken::'.(self::getAPIWebToken_ByUserSessionID($varUserSession))
                           )
                       )
                    );
                }
            catch (\Exception $ex) {
                $varReturn = NULL;
                }

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationUserPrivileges                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-22                                                                                           |
        | ▪ Creation Date   : 2025-09-22                                                                                           |
        | ▪ Description     : Mendapatkan User Role Privileges Aplikasi                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varUserID ► User ID                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationUserPrivileges($varUserSession, int $varUserID)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataPickSet_UserPrivileges',
                        [
                            [$varUserID, 'bigint' ]
                        ]
                        )
                    );

            $varReturn = 
                (\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['ProcessedData_JSON']
                        ))['general'];

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationUserSession_UserAccessPrivileges                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-22                                                                                           |
        | ▪ Creation Date   : 2025-09-22                                                                                           |
        | ▪ Description     : Mendapatkan Data Sesi Aplkasi Pengguna - Hak Akses Pengguna                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varUserID ► User ID                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationUserSession_UserAccessPrivileges($varUserSession)
            {
            try {
                $varReturn = (
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                       $varUserSession,
                       \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                           $varUserSession,
                           'ERPReborn::APIWebToken::'.(self::getAPIWebToken_ByUserSessionID($varUserSession))
                           )
                       )
                    )['userAccessPrivileges'];
                }
            catch (\Exception $ex) {
                $varReturn = NULL;
                }

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationUserSession_UserIdentity                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-22                                                                                           |
        | ▪ Creation Date   : 2025-09-22                                                                                           |
        | ▪ Description     : Mendapatkan Data Sesi Aplkasi Pengguna - Identitas Pengguna                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varUserID ► User ID                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationUserSession_UserIdentities($varUserSession)
            {
            try {
                $varReturn = (
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                       $varUserSession,
                       \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                           $varUserSession,
                           'ERPReborn::APIWebToken::'.(self::getAPIWebToken_ByUserSessionID($varUserSession))
                           )
                       )
                    )['userIdentity'];
                }
            catch (\Exception $ex) {
                $varReturn = NULL;
                }

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationUserRolePrivilegesMenu                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-15                                                                                           |
        | ▪ Creation Date   : 2020-12-15                                                                                           |
        | ▪ Description     : Mendapatkan User Role Privileges Menu Aplikasi                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varUserRoleID ► User Role ID                                                                             |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationUserRolePrivilegesMenu($varUserSession, int $varUserRoleID, int $varBranchID)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Application User Role Privileges Menu');
                try {
                    $varBufferDB = (new \App\Models\Database\SchSysConfig\General())->getMenuByUserRoleIDAndBranchID($varUserSession, 95000000000003, 11000000000004);
                    
                    $varReturn = [
                        'ID' => '000',
                        'Caption' => 'Menu',
                        'CallAction' => false
                        ];
                    
                    for($i=0; $i!=(count($varBufferDB)); $i++)
                        {                       
                        $varDataCode = explode('.', str_replace('<ACT>', '.', substr($varBufferDB[$i]['Code'], 1, strlen($varBufferDB[$i]['Code']))));                       

                        switch(count($varDataCode))
                            {
                            case 1:
                                $varReturn
                                    ['Child'][$varDataCode[0]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 2:
                                $varReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 3:
                                $varReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 4:
                                $varReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 5:
                                $varReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 6:
                                $varReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 7:
                                $varReturn
                                    ['Child'][$varDataCode[0]]
                                    ['Child'][$varDataCode[1]]
                                    ['Child'][$varDataCode[2]]
                                    ['Child'][$varDataCode[3]]
                                    ['Child'][$varDataCode[4]]
                                    ['Child'][$varDataCode[5]]
                                    ['Child'][$varDataCode[6]] = [
                                        'ID' => implode('.', $varDataCode),
                                        'Caption' => $varBufferDB[$i]['Caption'],
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 8:
                                $varReturn
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
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 9:
                                $varReturn
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
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 10:
                                $varReturn
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
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 11:
                                $varReturn
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
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            case 12:
                                $varReturn
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
                                        'CallAction' => (bool)$varBufferDB[$i]['CallAction'],
                                        'Child' => []
                                        ];
                                break;
                            default:
                                echo '';
                            }
                        }
                    $varReturn = self::getApplicationUserRolePrivilegesMenu_Simplification($varUserSession, $varReturn);
                    //dd($varReturn);
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
    | ▪ Method Name     : getApplicationUserRolePrivilegesMenu_Simplification                                                  |
    +--------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                       |
    | ▪ Last Update     : 2020-12-15                                                                                           |
    | ▪ Description     : Mendapatkan Simplifikasi User Role Privileges Menu Aplikasi                                          |
    +--------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                      |
    |      ▪ (mixed)  varUserSession ► User Session                                                                            |
    |      ▪ (array)  varData ► Data                                                                                           |
    | ▪ Output Variable :                                                                                                      |
    |      ▪ (string) varReturn                                                                                                |
    +--------------------------------------------------------------------------------------------------------------------------+
    */
    private static function getApplicationUserRolePrivilegesMenu_Simplification($varUserSession, array $varData)
        {
        $varReturn = [
            'ID' => $varData['ID'],
            'Caption' => $varData['Caption'],
            'CallAction' => $varData['CallAction']
            ];
        if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Child', $varData) == true)
            {
            if(count($varData['Child']) > 0)
                {
                $varReturn['Child'] = array_values($varData['Child']);
                for($i=0; $i!=count($varReturn['Child']); $i++)
                    {
                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Child', $varReturn['Child'][$i]) == true)
                        {
                        if(count($varReturn['Child'][$i]['Child']) > 0)
                            {
                            $varReturn['Child'][$i] = self::getApplicationUserRolePrivilegesMenu_Simplification($varUserSession, $varReturn['Child'][$i]);
                            //echo "Found ".$varReturn['Child'][$i]['Caption']."<br>";
                            }
                        }
                    }
                }
            }
        return $varReturn;
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
        | ▪ Method Name     : getCSRFToken                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-17                                                                                           |
        | ▪ Description     : Mencari Token CSRF                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getCSRFToken($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get CSRF Token');
                try {
                    $varReturn=csrf_token();
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
                    $varReturn = 
                        self::getConfigEnvironment(
                            $varUserSession,
                            $varKey,
                            '/config/Application/FrontEnd/environment.txt'
                            );
                    
                    if (is_numeric($varReturn) == true)
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
        | ▪ Creation Date   : 2020-08-11                                                                                           |
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
                if(is_file(getcwd().'/./../.LaravelCore/config/Application/BackEnd/environment.txt') == true)
                    {$varPathFile = getcwd().'/./../.LaravelCore/config/Application/BackEnd/environment.txt';}
                elseif(is_file(getcwd().'/./../../.LaravelCore/config/Application/BackEnd/environment.txt') == true)
                    {$varPathFile = getcwd().'/./../../.LaravelCore/config/Application/BackEnd/environment.txt';}
                elseif(is_file(getcwd().'/./../../../.LaravelCore/config/Application/BackEnd/environment.txt') == true)
                    {$varPathFile = getcwd().'/./../../../.LaravelCore/config/Application/BackEnd/environment.txt';}
                elseif(is_file(getcwd().'/./../../../../.LaravelCore/config/Application/BackEnd/environment.txt') == true)
                    {$varPathFile = getcwd().'/./../../../../.LaravelCore/config/Application/BackEnd/environment.txt';}
                elseif(is_file(getcwd().'/./../../../../../.LaravelCore/config/Application/BackEnd/environment.txt') == true)
                    {$varPathFile = getcwd().'/./../../../../../.LaravelCore/config/Application/BackEnd/environment.txt';}

                $varFileContent = file_get_contents($varPathFile);
                $varArrayTemp=explode("\n", $varFileContent);
                for($i=0, $iMax=count($varArrayTemp); $i!=$iMax; $i++)
                    {
                    if(strlen($varArrayTemp[$i])>0)
                        {
                        $varArrayTemp2 = explode("=", $varArrayTemp[$i]);
                        if (strcmp($varArrayTemp2[0], 'USER_SESSION_ID_SYSTEM')==0) {
                            $varReturn = (int) $varArrayTemp2[1];
                            break;
                            }
                        /*
                        $varValue=$varArrayTemp2;
                        array_shift($varValue);
                        $varValue=implode("=", $varValue);
                        $varData[$varArrayTemp2[0]]=$varValue;
                        */
                        }
                    }
                //$varReturn=(int) $varData['USER_SESSION_ID_SYSTEM'];                
                } 
            catch (\Exception $ex) {
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserSessionID_ByAPIWebToken                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-01                                                                                           |
        | ▪ Creation Date   : 2022-08-04                                                                                           |
        | ▪ Description     : Mendapatkan User Session ID berdasarkan API Web Token (varAPIWebToken)                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varAPIWebToken ► API Web Token                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string)  varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUserSessionID_ByAPIWebToken($varUserSession, string $varAPIWebToken)
            {
            try {
                //---> Get Data From Cache
                if (
                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::isExpired(
                        $varUserSession,
                        'ERPReborn::APIWebToken::'.$varAPIWebToken
                        )
                    == false    
                    ) {
                    $varReturn = (
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                            $varUserSession,
                            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                                $varUserSession,
                                'ERPReborn::APIWebToken::'.$varAPIWebToken
                                )
                            )
                        )['userLoginSession_RefID'];
                    }
                //---> Get Data From Database
                else
                    {
                    $varReturn = (
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                                $varUserSession,
                                'SchSysAsset.Func_GetData_UserSessionID_ByAPIWebToken',
                                [
                                    [$varAPIWebToken, 'varchar']
                                ]
                                )
                            )
                        )['data'][0]['Func_GetData_UserSessionID_ByAPIWebToken'];
                    }

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return NULL;
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAPIWebToken_ByUserSessionID                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-04                                                                                           |
        | ▪ Creation Date   : 2022-08-04                                                                                           |
        | ▪ Description     : Mendapatkan API Web Token berdasarkan User Session ID (varUserSessionID)                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string)  varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAPIWebToken_ByUserSessionID($varUserSession)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.Func_GetData_APIWebToken_ByUserSessionID',
                        [
                            [$varUserSession, 'bigint']
                        ]
                        )
                    );
                return $varReturn['data'][0]['Func_GetData_APIWebToken_ByUserSessionID'];
                }

            catch (\Exception $ex) {
                return
                    NULL;
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAPIWebToken_System                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        | ▪ Description     : Mencari API Web Token of System (SysEngine)                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAPIWebToken_System()
            {
            $varUserSession = self::getUserSessionID_System();

            try {
                /*
                try {
                    $varReturn =
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                                $varUserSession,
                                'SchSysAsset.Func_GetData_APIWebToken_SysEngine',
                                [
                                ]
                                )
                            );
    
                    $varReturn = 
                        $varReturn['data'][0]['Func_GetData_APIWebToken_SysEngine'];
                    }

                catch (\Exception $ex) {
                    $varReturn =
                        'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiU3lzRW5naW5lIiwiaWF0IjoxNTk4NDM0MDcxfQ.fkz2xMA1tUNmA5VaWC75a-A9WdYAmqToLbze3Sxojf4';
                    }
                */

                $varReturn =
                    'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiU3lzRW5naW5lIiwiaWF0IjoxNTk4NDM0MDcxfQ.fkz2xMA1tUNmA5VaWC75a-A9WdYAmqToLbze3Sxojf4';

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
    
            return
                $varReturn;
            }
        }
    }

?>