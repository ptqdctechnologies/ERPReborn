<?php

namespace App\Console\Commands\zhtScheduler
    {
    use Illuminate\Console\Command;

    class ScheduledTask_EveryMinute extends Command
        {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'scheduledTask:everyMinute';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Laravel Console Agent - Every Minute';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
            {
            parent::__construct();
            }

        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
            {
//            $varFilePath = '/zhtConf/log/lastSession/scheduledTask/everyMinute/core.log';
//            shell_exec("touch ".$varFilePath);
            //$this->info($varFilePath);

//            echo "xxx";
  //          echo "\n\n";
            
    //        echo is_file('./../.LaravelCore/config/Application/BackEnd/environment.txt');
            
            //echo getcwd();
      
//            \Illuminate\Support\Facades\DB::select('SELECT NOW();');
//            echo "done";
            
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            (new \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyMinute\system\setJobs\v1\setJobs())->loadAllJobs($varUserSession);

            return 1;
            //    return 0;
            }
        }
    }