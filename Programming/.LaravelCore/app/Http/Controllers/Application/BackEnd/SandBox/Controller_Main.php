<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function init()
            {
            $hostname = env("DB_CONNECTION", "somedefaultvalue");
            
            \App\Helpers\ZhtHelper\Database\PostgreSQL::init();
            echo "<br>";
            echo "weleh";
            }
        }
    }
 
?>