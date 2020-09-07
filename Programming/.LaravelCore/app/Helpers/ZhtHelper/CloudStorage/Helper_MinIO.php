<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\CloudStorage                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\CloudStorage
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_MinIO                                                                                                 |
    | ▪ Description : Menangani CloudStorage MinIO                                                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_MinIO
        {
        private static $ObjMinIO = null;
        private static $varBucketName = 'erp-reborn';
        
        public function __construct() 
            {
            //\Config::set('filesystems.disks.s3.minio', $bucket);
            self::init('erp-reborn');
            }
        
        private static function init($varUserSession, $varBucketName)
            {
            self::$varBucketName = $varBucketName;
            self::$ObjMinIO = \Storage::createS3Driver([
                'driver' => 's3',
                'endpoint' => env('MINIO_ENDPOINT'),
                'key'    => env('MINIO_KEY'),
                'secret' => env('MINIO_SECRET'),
                'region' => env('MINIO_REGION'),
                'bucket' => env(self::$varBucketName, 'MINIO_BUCKET'),
                ]);
            echo "---> Init<br><br>";
            }
            
        public static function getBucketFileList($varUserSession, $varBucketName = null)
            {
            if(!$varBucketName)
                {
                $varBucketName = env('MINIO_BUCKET', self::$varBucketName);
                }
echo "!!!!!!!!!!";

$varKey = 'MINIO_BUCKET';

//\App\Helpers\ZhtHelper\System\

            echo \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment2($varKey);

/*
            $varFileContent = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent($varUserSession, 
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
echo $varReturn;
*/


//            var_dump($varFileContent);
            
      //      echo \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchSystemFilePath(getcwd(), '.env');
                
                
//                echo env('MINIO_SECRET');
                
//                echo \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_SECRET');
                
      //          $varBucketName = env('MINIO_BUCKET');
                
//            self::init($varUserSession, $varBucketName);
  //          $varReturn = self::$ObjMinIO->files();
    //        return $varReturn;
            }

        public static function test()
            {
            $varUserSession = 000000;
            $x = self::getBucketFileList($varUserSession);
    //        var_dump($x);
            }

            
        public static function testILD()
            {
            self::init('erp-reborn');
            $x = self::$ObjMinIO->files();
            var_dump($x);
            
            echo "<br>~~~~~~~~~~~~~~~~~~~~~~~<br>";
            
            
            $bucketName = 'erp-reborn'; 
            $storage = \Storage::createS3Driver([
                'driver' => 's3',
                'endpoint' => 'http://172.28.0.7:9000',
                'key'    => 'AKIAIOSFODNN7EXAMPLE',
                'secret' => 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY',
                'region' => 'us-east-1',
                'bucket' => $bucketName,
                ]);
            $x = $storage->files();
            var_dump($x);

            echo "<br>";
            
            $bucketName = 'erp-reborn2'; 
            $storage = \Storage::createS3Driver([
                'driver' => 's3',
                'endpoint' => 'http://172.28.0.7:9000',
                'key'    => 'AKIAIOSFODNN7EXAMPLE',
                'secret' => 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY',
                'region' => 'us-east-1',
                'bucket' => $bucketName,
                ]);
            $x = $storage->files();
            var_dump($x);
            
            
/*            
//            \Storage::cloud()->put('hello.json', '{"hello": "world"}');
            echo "<br>~~~~~~<br>";
            $x = \Storage::disk('minio')->files();
            var_dump($x);
            $bucket = 'erp-reborn2'; 
            \Config::set('filesystems.disks.s3.minio', $bucket);
            echo "<br>~~~~~~<br>";
            $x = \Storage::disk('minio')->files();
            var_dump($x);

 */
            }
        }
    }