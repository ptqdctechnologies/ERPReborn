<?php

namespace App\Http\Controllers\Application\FrontEnd\SandBox
    {
    use Illuminate\Http\JsonResponse;

    class Controller_HelloWorld extends \App\Http\Controllers\Controller
        {
        function ShowHelloWorld()
            {
            \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setHTTPHeader_JSONResponse();

            /*
            //------------< BLOCKING >------------------
            $varAPIExecutionStartDateTime = (new \DateTime());
            //------------< BLOCKING >------------------
            */

            $varData = [
                'message' => 'HelloWorld'
                ];

            /*
            //------------< BLOCKING >------------------
            dd (
                \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
                    \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
                    )
                );
            //------------< BLOCKING >------------------
            */

            return
                response()->json($varData);
            
            \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setHTTPHeader_JSONResponse();
            }
        }
    }