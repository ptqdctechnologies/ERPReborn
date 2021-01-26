<?php

namespace App\Console\Commands\zhtScheduler
    {
    use Illuminate\Console\Command;

    class ScheduledTask_EveryWeek extends Command
        {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'scheduledTask:everyWeek';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Laravel Console Agent - Every Week (on Sunday at 00:00)';

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
            $varFilePath = '/zhtConf/log/lastSession/scheduledTask/everyWeek/core.log';
            shell_exec("touch ".$varFilePath);
            //$this->info($varFilePath);

            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            (new \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyWeek\system\setJobs\v1\setJobs())->loadAllJobs($varUserSession);

            return 1;
            //return 0;
            }
        }
    }