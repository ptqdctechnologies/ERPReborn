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
                        
            $varReturn = date("Y-m-d H:i:s.").$varMicroSecond.'+'.$varTimeZoneOffset;

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLaravelEnvironment                                                                                |
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
        public static function getLaravelEnvironment($varKey)
            {
            $varFileContent = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent(
                    \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchSystemFilePath(getcwd(), '.env')
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
        }
    }

?>
