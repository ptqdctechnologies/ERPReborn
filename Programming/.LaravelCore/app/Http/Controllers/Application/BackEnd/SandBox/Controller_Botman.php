<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    //use BotMan\BotMan\BotMan;
    //use Illuminate\Http\Request;
    //use BotMan\BotMan\Messages\Incoming\Answer;

    class Controller_Botman extends \App\Http\Controllers\Controller
        {
        private $ObjBotMan;
        
        private function init()
            {
            $this->ObjBotMan = app('botman');
            }

        /**
         * Place your BotMan logic here.
         */
        public function handle()
            {
            $this->init();
            $ObjBotMan = $this->ObjBotMan;

            $this->ObjBotMan->hears(
                '{varMessage}', 
                function($ObjBotMan, $varMessage) {
                    if ($varMessage == 'hi') {
                        $this->askName();
                        }
                    else {
                        $this->ObjBotMan->reply("write 'hi' for testing...");
                        }
                    }
                );
            $this->ObjBotMan->listen();
            }

        /**
         * Place your BotMan logic here.
         */
        public function askName()
            {
            $this->ObjBotMan->ask(
                'Hello! What is your Name?', 
                function(\BotMan\BotMan\Messages\Incoming\Answer $ObjAnswer) {
                    $name = $ObjAnswer->getText();
                    $this->say('Nice to meet you '.$name);
                    }
                );
            }
        }
    }