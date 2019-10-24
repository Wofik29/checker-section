<?php

use Illuminate\Database\Seeder;

class OfficesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('offices')->insert([
            [
                'number' => 1,
                'address' => 'г. Пермь, ул. Ленина, 45',
                'coordinates' => '[58.011580, 56.237537]',
            ],
            [
                'number' => 2,
                'address' => 'г. Пермь, ул. Шоссе Космонавтов, 120/1',
                'coordinates' => '[57.990758, 56.193349]',
            ],
            [
                'number' => 3,
                'address' => 'г. Пермь, ул. Героев Хасана, 7а',
                'coordinates' => '[57.993677, 56.257067]',
            ],
        ]);
    }
}
