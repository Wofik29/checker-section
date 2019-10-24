<?php

use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $insert = [];
        $relations = [
            ['groups' => [1,2,3,7,8,9,10,11,12,13], 'offices' => [1,2,3]],
            ['groups' => [4,5], 'offices' => [1,2]],
            ['groups' => [6], 'offices' => [3]],
            ['groups' => [14,15], 'offices' => [2,3]],
            ['groups' => [16], 'offices' => [1]],
        ];

        foreach ($relations as $relation) {
            foreach ($relation['groups'] as $group) {
                foreach ($relation['offices'] as $office) {
                    $insert[] = [
                        'group_id' => $group,
                        'office_id' => $office,
                    ];
                }
            }
        }

        \Illuminate\Support\Facades\DB::table('offices_groups')->insert($insert);
    }
}
