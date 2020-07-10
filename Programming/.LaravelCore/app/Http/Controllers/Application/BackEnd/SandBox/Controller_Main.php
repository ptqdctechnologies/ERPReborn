<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function init()
            {
            \App\Helpers\ZhtHelper\General\Session::delete(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            
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

            
            \App\Helpers\ZhtHelper\Database\PostgreSQL::init();
            \App\Helpers\ZhtHelper\Database\PostgreSQL::getStatusAvailability();
            $x = \App\Helpers\ZhtHelper\Database\PostgreSQL::getQueryExecution("SELECT 1 AS xxx");
            
            var_dump($x);
            
            
            
            
            
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