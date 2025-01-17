<?php

namespace App\Console\Commands;

use App\models\Orders;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddColumn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addColumn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        DB::query('ALTER TABLE "orders" ADD "order_id" integer');

    }
}
