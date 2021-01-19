<?php

namespace App\Console\Commands
    {
    use Illuminate\Console\Command;

    class ScheduledTasK_EveryMinute extends Command
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
//            $this->info('Execute Every Minute');
            $varFilePath = getcwd().'/app/Console/Commands/zhtScheduler/Log/ScheduledTask_EveryMinute.log';
            shell_exec("touch ".$varFilePath);
            $this->info($varFilePath);

            return 1;
            //    return 0;
            }
        }
    }