<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            }
        
        public function test2()
            {
            
            echo "xxxx";
            }










        public function test()
            {
            
            
            
            
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            
//            \App\Helpers\ZhtHelper\System\Registry::init();

            //$varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());         

            
//            echo \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Registry::Global::Environment::Application::Name');

            echo "<br>----------------<br>";

//            var_dump($varDataSession);
            echo "<br>----------------<br>";







//            \App\Helpers\ZhtHelper\System\Registry::setSpecificRegistry(0, 'Zzz::Xxx', '$varValue');
//            echo \App\Helpers\ZhtHelper\System\Registry::getSpecificRegistry(0, 'Zzz::Xxx');
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutut(000000, 'Helper::ZhtHelper', 'xxxx');
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput(000000, 'Helper::ZhtHelper', 'yyyy');
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogError(000000, 'Helper::ZhtHelper', 'Error yyyy');



            //\App\Helpers\ZhtHelper\System\Registry::init();
            //echo "<br>-----------";
            //echo \App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            //echo "-----------";
            
            
            
            
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput('Helper::ZhtHelper', 000000, 'xxxx');
//            echo \App\Helpers\ZhtHelper\Logger\SystemLog::getLogOutput('Log::Helper::ZhtHelper', 000000);








            //$varRegistry['Registry']['Global']['Environment']['Database']['Type']='PostgreSQL';

            echo \App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(000000, 'xxxxxxxxxxxxxx');
            
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::init(000000);
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStatusAvailability(000000);
            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(000000, "SELECT 1 AS xxx");
            echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getDateTimeTZ(000000);


            

            
            //var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getDateTimeTZ());
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getValue(000000, 'myKey2'));
            \App\Helpers\ZhtHelper\Database\Helper_Redis::setValue(000000, 'myKey2', 'myValue', 1);
            \App\Helpers\ZhtHelper\Database\Helper_Redis::isExist(000000, 'myKey2');
            echo "<br><br>Delete:";
            \App\Helpers\ZhtHelper\Database\Helper_Redis::delete(000000, 'myKey2');
            echo "<br><br>TTL:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getTTL(000000, 'myKey2'));
            echo "<br><br>GetValue:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getValue(000000, 'myKey2'));
            echo "<br><br>DateTime:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getDateTime(000000));
            echo "<br><br>Info:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getInfo(000000));
            //var_dump($x);
            
            //phpinfo();
            
            
            
            echo "<br>"; echo "<br>"; echo "<br>";
            echo "weleh";

            echo "weleh";
            
            
            
//            var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));
  //          echo \App\Helpers\ZhtHelper\General\Session::delete('ERPReborn');
    //        echo "Terhapuskah";
      //      var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));            
            
            }
        }
    }
 
?>