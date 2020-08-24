<?php

namespace App\Http\Middleware\Application\BackEnd\API\Authentication
    {
    class TerminateHandler
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            return $next($request);
            }
            
        public function terminate($request, $response)
            {
            $varUserSession = 000000;
            //$x = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getClientAgent($varUserSession, $request);
            //$x = $request->ip();
            //$x = url()->current();
            //$x = $_SERVER['HTTP_USER_AGENT'];
            //$x = \App\Helpers\ZhtHelper\General\Helper_Network::getClientIPAddress($varUserSession);
            //$x = \App\Helpers\ZhtHelper\General\Helper_Network::getMACAddress($varUserSession, '172.28.0.4');
            
            //---> Store API Access Request to Database
            $varSQL = "
                SELECT 
                    *
                FROM 
                    \"SchSysConfig\".\"Func_TblRotateLog_APIRequest_SET\"(
                        NOW()::timestamptz,
                        '".(\App\Helpers\ZhtHelper\General\Helper_Network::getClientIPAddress($varUserSession))."'::cidr,
                        '".(url()->current())."'::varchar,
                        '".($_SERVER['HTTP_USER_AGENT'])."'::varchar
                        )
                ";
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, $varSQL);
            
            //file_put_contents(getcwd().'./../tmp/1.txt', $varSQL);
            //file_put_contents(getcwd().'./../tmp/1.txt', $x);
            
            //echo "<br>".getcwd().'./../tmp/1.txt'."<br>";
            //file_put_contents(getcwd().'./../tmp/1.txt', 'hello terminate');
            //echo "TERMINATE";
            }
        }
    }

?>