<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TaskInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate tables and run the seeders';

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('key:generate');
        $this->call('route:cache');
        File::deleteDirectory(public_path('storage/company'));
        $this->call('storage:link');
        $this->call('migrate',
            ['--path'=>'/database/migrations/2014_10_12_000000_create_users_table.php']
        );$this->call('migrate',
            ['--path'=>'/database/migrations/2014_10_12_100000_create_password_resets_table.php']
        );$this->call('migrate',
            ['--path'=>'/database/migrations/2019_03_18_230311_create_companies_table.php']
        );$this->call('migrate',
            ['--path'=>'/database/migrations/2019_03_18_230125_create_employees_table.php']
        );
        $this->call('db:seed',[
            '--class'=>'UsersTableSeeder',
            '--force'=>true
        ]);
        $this->info('MenaTech task installed');
    }
}
