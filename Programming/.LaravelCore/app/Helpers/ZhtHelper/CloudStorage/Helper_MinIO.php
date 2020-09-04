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
        public function __construct() 
            {
            \Config::set('filesystems.disks.s3.minio', $bucket);
            }
        
        public static function test()
            {
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