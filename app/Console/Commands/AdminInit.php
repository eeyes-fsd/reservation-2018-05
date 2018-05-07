<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Admin;

class AdminInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:initialize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化管理员账户';

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
        Admin::create([
            'name' => env('INITIAL_ADMIN'),
            'password' => bcrypt(env('INITIAL_PASSWORD')),
            'super' => true,
        ]);
    }
}
