<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
    {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
        {
        // $schedule->command('inspire')->hourly();

        $schedule->command(\App\Console\Commands\zhtScheduler\ScheduledTask_EveryMinute::class, ['--no-ansi'])
            ->everyMinute()
            ->appendOutputTo('/var/log/cron.log');

        $schedule->command(\App\Console\Commands\zhtScheduler\ScheduledTask_EveryHour::class, ['--no-ansi'])
            ->hourly()
            ->appendOutputTo('/var/log/cron.log');
      
        $schedule->command(\App\Console\Commands\zhtScheduler\ScheduledTask_EveryTwoHours::class, ['--no-ansi'])
            ->everyTwoHours()
            ->appendOutputTo('/var/log/cron.log');
        
        $schedule->command(\App\Console\Commands\zhtScheduler\ScheduledTask_EveryDay::class, ['--no-ansi'])
            ->daily()
            ->appendOutputTo('/var/log/cron.log');

        $schedule->command(\App\Console\Commands\zhtScheduler\ScheduledTask_EveryWeek::class, ['--no-ansi'])
            ->weekly()
            ->appendOutputTo('/var/log/cron.log');

        $schedule->command(\App\Console\Commands\zhtScheduler\ScheduledTask_EveryMonth::class, ['--no-ansi'])
            ->monthly()
            ->appendOutputTo('/var/log/cron.log');

        $schedule->command(\App\Console\Commands\zhtScheduler\ScheduledTask_EveryYear::class, ['--no-ansi'])
            ->yearly()
            ->appendOutputTo('/var/log/cron.log');
        }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
        {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
        }
    
    protected $routeMiddleware = [
        'BeforeMiddleware' => \App\Http\Middleware\Application\BackEnd\RequestHandler_General::class,
        'AfterMiddleware' => \App\Http\Middleware\Application\BackEnd\ResponseHandler_General::class,
        ];
    }
