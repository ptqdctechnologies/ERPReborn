<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function init()
            {
            \App\Helpers\ZhtHelper\General\Session::delete(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput('Helper::ZhtHelper', 000000, 'xxxx');
            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput('Helper::ZhtHelper', 000000, 'yyyy');
            
            \App\Helpers\ZhtHelper\Logger\SystemLog::getLogOutput(000000);



            //\App\Helpers\ZhtHelper\System\Registry::init();
            //echo "<br>-----------";
            //echo \App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            //echo "-----------";
            
            
            
            
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput('Helper::ZhtHelper', 000000, 'xxxx');
//            echo \App\Helpers\ZhtHelper\Logger\SystemLog::getLogOutput('Log::Helper::ZhtHelper', 000000);









            //$varRegistry['Registry']['Global']['Environment']['Database']['Type']='PostgreSQL';

            
            \App\Helpers\ZhtHelper\Database\PostgreSQL::init();
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