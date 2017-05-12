<?php

use App\models\Cheeses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cheeses = [
            ['id' => 'mozzarella', 'name' => 'Mocarela', 'calories' => 79],
            ['id' => 'cheddar', 'name' => 'Čederis', 'calories' => 123],
            ['id' => 'swiss', 'name' => 'Šveicariškas', 'calories' => 98]
        ];

        DB::beginTransaction();

        try {
            foreach ($cheeses as $cheese) {
                $record = Cheeses::find($cheese['id']);

                if (!$record) {
                    Cheeses::create($cheese);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure '. $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }

        DB::commit();
    }
}
