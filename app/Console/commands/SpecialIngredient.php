<?php

namespace App\Console\Commands;

use App\models\Ingredients;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SpecialIngredient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pick:ingredient';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Highlighting special ingredient';

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
        cache()->put('super-ingredient', Ingredients::all()->random(1)->first()->id, 120);
    }
}
