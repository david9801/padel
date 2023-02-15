<?php

namespace Database\Seeders;

use App\Models\Court;
use App\Models\Shift;
use Illuminate\Database\Seeder;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Court::updateOrCreate(
            ['id' => Court::COURT1],
            ['number_court' => 'Court 1 indoor']
        );
        Court::updateOrCreate(
            ['id' => Court::COURT2],
            ['number_court' => 'Court 2 indoor']
        );
        Court::updateOrCreate(
            ['id' => Court::COURT3],
            ['number_court' => 'Court 3 outdoor']
        );
        Court::updateOrCreate(
            ['id' => Court::COURT4],
            ['number_court' => 'Court 4 outdoor']
        );
    }
}
