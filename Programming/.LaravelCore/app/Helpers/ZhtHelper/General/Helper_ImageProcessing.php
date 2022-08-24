<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_ImageProcessing                                                                                       |
    | ▪ Description : Menangani Image Processing                                                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_ImageProcessing
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-24                                                                                           |
        | ▪ Creation Date   : 2022-08-24                                                                                           |
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
        | ▪ Last Update     : 2022-08-24                                                                                           |
        | ▪ Creation Date   : 2022-08-24                                                                                           |
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


        public static function setConvertFromContent($varUserSession, $varData, int $varMaxEdgeSize = null, string $varImageFormat = null)
            {
            if (!$varMaxEdgeSize) {
                $varMaxEdgeSize = 300;
                }

            if (!$varImageFormat) {
                $varImageFormat = 'png24';
                }
                
            $ObjImagick = new \Imagick();
            $ObjImagick->readImageBlob($varData);

            //---> Image Resize
            $varOriginalWidth = $ObjImagick->getImageWidth();
            $varOriginalHeight = $ObjImagick->getImageHeight();
            if($varOriginalWidth > $varOriginalHeight) {
                $varSizeCoefficient = $varMaxEdgeSize / $varOriginalWidth;
                }
            else {
                $varSizeCoefficient = $varMaxEdgeSize / $varOriginalHeight;
                }
            $varNewWidth = $varOriginalWidth * $varSizeCoefficient;
            $varNewHeight = $varOriginalHeight * $varSizeCoefficient;

/*
            echo '<br>'.$varOriginalWidth;
            echo '<br>'.$varOriginalHeight;
            echo '<br>'.$varSizeCoefficient;
            echo '<br>'.$varNewWidth;
            echo '<br>'.$varNewHeight;
*/
            
            $ObjImagick->setResolution(300, 300);
            $ObjImagick->scaleImage($varNewWidth, $varNewHeight);
            $ObjImagick->setImageCompressionQuality(100);
            
            
//            $varImageFormat = 'jpg';
            $varImageFormat = 'png24';
            $ObjImagick->setImageFormat($varImageFormat);
            
            $varNewData = $ObjImagick->getimageblob();

//           header('Content-type: image/jpeg');

            
//           header('Content-type: image/png');
//            echo $ObjImagick;

            dd($varNewData);
            }
        }
    }