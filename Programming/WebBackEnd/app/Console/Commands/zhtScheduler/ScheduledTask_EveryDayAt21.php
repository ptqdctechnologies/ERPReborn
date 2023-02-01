<?php

namespace App\Console\Commands\zhtScheduler
    {
    use Illuminate\Console\Command;

    class ScheduledTask_EveryDayAt21 extends Command
        {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'scheduledTask:everyDayAt21';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Laravel Console Agent - Every Day At 21 O\'Clock';

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
            //$this->info($varFilePath);

            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            (new \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyDayAt21\system\setJobs\v1\setJobs())->loadAllJobs($varUserSession);

            return 1;
            //return 0;
            }
        }
    }