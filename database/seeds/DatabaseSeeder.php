<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(cheesesSeeder::class);
        $this->call(PadSeeder::class);
        $this->call(IngredientsSeeder::class);
    }
}
