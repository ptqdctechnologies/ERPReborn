<?php

namespace App\Http\Controllers\Application\FrontEnd\SandBox
    {
    class Controller_Examples extends \App\Http\Controllers\Controller
        {
        private $ArrayAPIKey = [
            'transaction_create_finance_setPettyCash'
            ];

        

        function xxx__call($func, $params) {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            if (in_array($func, $this->ArrayAPIKey)) {
                $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall/'.str_replace('_', '.', $func).'.php');
                echo 'Test >> '.$varFilePath;
                //dd (file_get_contents($varFilePath));
                $varSource = file_get_contents($varFilePath);
                $varPattern = '/function[\s]+([a-zA-Z0-9_-]*)[\s]*\((.*)\)[\s]*{([\w\s\D]+)}[\s]*/iU';
                preg_match_all($varPattern, $varSource, $varArrayMatches);
                $varArrayName = $varArrayMatches[1];
                $varArrayParameter = $varArrayMatches[2];
                $varArrayContent = $varArrayMatches[3];
                for ($i=0,$l=count($varArrayName); $i<$l; $i++) 
                    {
                    echo "<br>".$varArrayName[$i];
                    //$this->_funcs[$varArrayName[$i]] = create_function($ptrn, $code)
                    
                    //$this->_funcs[$varArrayName[$i]] = create_function($varArrayParameter[$i], $varArrayContent[$i]);
                    $this->varArrayName[$i] = create_function($varArrayParameter[$i], $varArrayContent[$i]);
                    }           
                echo "<br>";
                echo "done";
                }
            else
                {
                return "gak ketemu";
                }
            }
        
        function __construct() 
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            for($i=0; $i!=count($this->ArrayAPIKey); $i++)
                {
                $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall/'.str_replace('_', '.', $this->ArrayAPIKey[$i]).'.php');
                $varSource = file_get_contents($varFilePath);
                $varPattern = '/function[\s]+([a-zA-Z0-9_-]*)[\s]*\((.*)\)[\s]*{([\w\s\D]+)}[\s]*/iU';
                preg_match_all($varPattern, $varSource, $varArrayMatches);
                $varArrayName = $varArrayMatches[1];
                $varArrayParameter = $varArrayMatches[2];
                $varArrayContent = $varArrayMatches[3];
                for ($j=0,$l=count($varArrayName); $j<$l; $j++) 
                    {
                    echo "<br>".$varArrayName[$j];
                    echo "<br>".$varArrayParameter[$j];
                    echo "<br>".$varArrayContent[$j];
                    $varNewName = $varArrayName[$j];
                    $this->_funcs[$varNewName] = create_function($varArrayParameter[$j], $varArrayContent[$j]);
                    //$this->varNewName = create_function($varArrayParameter[$j], $varArrayContent[$j]);
                    
                    echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~";
                    }
            $arr = get_defined_functions();
            print_r($arr);
                }
            }

/*        public function __call($name,$args){
            if (isset($this->_funcs[$name])) $this->_funcs[$name]($this,$args);
            else 
                echo "gak ketemu";
            }*/
        
        public function testAja()
            {
            //$varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            //$varClass = 'App\\Http\\Controllers\\Application\\FrontEnd\\SandBox\\Examples_APICall\\transaction_create_finance_setPettyCash\\throughAPIGateway.php';
            //$varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)));
            //echo "<br>";
            //$x = require_once($varFilePath);
            
            //echo "<br>";
            //echo "1234567 >> ".$varFilePath;
            
            //(new (App\Http\Controllers\Application\FrontEnd\SandBox\Controller_Examples()))->one();
            echo "<br>";
            echo "~~~~~~~~~~~~~";
            //echo $this->transaction_create_finance_setPettyCash();
            echo "<br>";
            
            
            echo $this->testOye();
            
            //echo "~~~~~~~~~~~~~";
            //$arr = get_defined_functions();
            //--print_r($arr);
            }
        }
    }