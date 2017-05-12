<?php

use App\models\Pads;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pads = [
            ['id' => 'full_grain', 'name' => 'pilno grūdo miltų picos padas', 'calories' => 197],
            ['id' => 'regular', 'name' => 'mielinis picos padas', 'calories' => 378]
        ];

        DB::beginTransaction();

        try {
            foreach ($pads as $pad) {
                $record = Pads::find($pad['id']);

                if (!$record) {
                    Pads::create($pad);
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
