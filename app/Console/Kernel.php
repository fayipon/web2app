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
        \App\Console\Commands\NamiAutoMatch::class,
        \App\Console\Commands\NamiAutoRate::class,
        \App\Console\Commands\NamiAutoResult::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    //	$schedule->command('productrate:refresh')->hourly();
    
    //	$schedule->command('nami:match')->everyMinute();  
    //	$schedule->command('nami:rate')->everyMinute();  
    //	$schedule->command('nami:result')->everyMinute();  
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
}
