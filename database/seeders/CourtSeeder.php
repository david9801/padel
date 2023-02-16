<?php

namespace Database\Seeders;

use App\Models\Pista;
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
        Pista::updateOrCreate(
            ['id' => Pista::COURT1],
            ['numero' => 'Court 1 indoor']
        );
        Pista::updateOrCreate(
            ['id' => Pista::COURT2],
            ['numero' => 'Court 2 indoor']
        );
        Pista::updateOrCreate(
            ['id' => Pista::COURT3],
            ['numero' => 'Court 3 outdoor']
        );
        Pista::updateOrCreate(
            ['id' => Pista::COURT4],
            ['numero' => 'Court 4 outdoor']
        );
    }
}
