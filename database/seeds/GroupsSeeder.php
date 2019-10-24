<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class GroupsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $updatedAt = $createdAt = now();

        \Illuminate\Support\Facades\DB::table('groups')->insert([
            [
                'number' => 1,
                'min_age' => '7',
                'max_age' => '13',
                'days' => '[1,3]',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 2,
                'min_age' => '7',
                'max_age' => '13',
                'days' => '[1,3]',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 3,
                'min_age' => '7',
                'max_age' => '13',
                'days' => '[1,3]',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 4,
                'min_age' => '7',
                'max_age' => '13',
                'days' => '[2,4]',
                'start' => '17:00',
                'end' => '18:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 5,
                'min_age' => '7',
                'max_age' => '13',
                'days' => '[2,4]',
                'start' => '17:00',
                'end' => '18:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 6,
                'min_age' => '9',
                'max_age' => '15',
                'days' => '[2,4]',
                'start' => '15:00',
                'end' => '16:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 7,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[2,4]',
                'start' => '19:00',
                'end' => '20:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 8,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[2,4]',
                'start' => '19:00',
                'end' => '20:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 9,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[2,4]',
                'start' => '19:00',
                'end' => '20:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 10,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[2,5]',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 11,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[2,5]',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 12,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[2,5]',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 13,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[2,5]',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 14,
                'min_age' => '7',
                'max_age' => '13',
                'days' => '[1,3]',
                'start' => '12:00',
                'end' => '13:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 15,
                'min_age' => '7',
                'max_age' => '13',
                'days' => '[1,3]',
                'start' => '12:00',
                'end' => '13:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
            [
                'number' => 16,
                'min_age' => '14',
                'max_age' => '18',
                'days' => '[1,3]',
                'start' => '17:00',
                'end' => '18:30',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ],
        ]);
    }
}

