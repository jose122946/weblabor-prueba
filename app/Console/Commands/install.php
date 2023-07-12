<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instalacion del proyecto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call("migrate");
        Artisan::call("storage:link");
        Artisan::call("db:seed");
        Artisan::call("db:seed --class ProjectSeeder");
    }
}
