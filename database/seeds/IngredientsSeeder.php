<?php

use App\models\Ingredients;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            ['id' => 'salami', 'name' => 'Salami', 'calories' => 35],
            ['id' => 'ham', 'name' => 'Kumpis', 'calories' => 24],
            ['id' => 'mashrooms', 'name' => 'Pievagrybiai', 'calories' => 15],
            ['id' => 'olives', 'name' => 'Alyvuogės', 'calories' => 20],
            ['id' => 'pickled_onions', 'name' => 'Konservuoti svogūnėliai', 'calories' => 18],
            ['id' => 'jalapenos', 'name' => 'Chalapos paprikos', 'calories' => 25],
            ['id' => 'pickled_paprika', 'name' => 'Konservuotos paprikos', 'calories' => 27],
            ['id' => 'chili_paprika', 'name' => 'Aitriosios paprikos', 'calories' => 20],
            ['id' => 'pickles', 'name' => 'Marinuoti agurkėliai', 'calories' => 19],
            ['id' => 'fresh_paprika', 'name' => 'Šviežios paprikos', 'calories' => 33],
            ['id' => 'pickled_pineapple', 'name' => 'Konservuoti ananasai', 'calories' => 26],
            ['id' => 'chicken', 'name' => 'Vištiena', 'calories' => 19],
            ['id' => 'tuna', 'name' => 'Tunas', 'calories' => 33],
            ['id' => 'bacon', 'name' => 'Šoninė', 'calories' => 29],
            ['id' => 'minced_pork', 'name' => 'Malta kiauliena', 'calories' => 39],
            ['id' => 'onions', 'name' => 'Svogūnai', 'calories' => 15],
            ['id' => 'sun_dried_tomatoes', 'name' => 'Saulėje džiovinti pomidorai', 'calories' => 19],
            ['id' => 'artichokes', 'name' => 'Artišokai', 'calories' => 19],
            ['id' => 'honey_mushrooms', 'name' => 'Marinuoti kelmučiai', 'calories' => 12],
            ['id' => 'rucola', 'name' => 'Gražgarstės', 'calories' => 17],
        ];

        DB::beginTransaction();

        try {
            foreach ($ingredients as $ingredient) {
                $record = Ingredients::find($ingredient['id']);

                if (!$record) {
                    Ingredients::create($ingredient);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure ' . $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }

        DB::commit();
    }
}
