<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:address';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import .sql address files';

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
        DB::unprepared(file_get_contents('database/province.sql'));
        DB::unprepared(file_get_contents('database/district.sql'));
        DB::unprepared(file_get_contents('database/ward.sql'));
    }
}
