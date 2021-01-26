<?php

namespace App\Console\Commands\zhtScheduler
    {
    use Illuminate\Console\Command;

    class ScheduledTask_EveryYear extends Command
        {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'scheduledTask:everyYear';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Laravel Console Agent - Every Year (on First Day of Year at 00:00)';

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
            $varFilePath = '/zhtConf/log/lastSession/scheduledTask/everyYear/core.log';
            shell_exec("touch ".$varFilePath);
            //$this->info($varFilePath);

            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            (new \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyYear\system\setJobs\v1\setJobs())->loadAllJobs($varUserSession);
            
            return 1;
            //return 0;
            }
        }
    }