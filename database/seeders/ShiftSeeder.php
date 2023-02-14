<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shift::updateOrCreate(
            ['id' => Shift::DE_9_A_10],
            ['description' => 'de 9:00 a 10:00']
        );

        Shift::updateOrCreate(
            ['id' => Shift::DE_10_A_11],
            ['description' => 'de 10:00 a 11:00']
        );
        Shift::updateOrCreate(
            ['id' => Shift::DE_10_A_11],
            ['description' => 'de 10:00 a 11:00']
        );
        Shift::updateOrCreate(
            ['id' => Shift::DE_11_A_12],
            ['description' => 'de 11:00 a 12:00']
        );
        Shift::updateOrCreate(
            ['id' => Shift::DE_12_A_13],
            ['description' => 'de 12:00 a 13:00']
        );
        Shift::updateOrCreate(
            ['id' => Shift::DE_13_A_14],
            ['description' => 'de 13:00 a 14:00']
        );
        Shift::updateOrCreate(
            ['id' => Shift::DE_14_A_15],
            ['description' => 'de 14:00 a 15:00']
        );
        Shift::updateOrCreate(
            ['id' => Shift::DE_15_A_16],
            ['description' => 'de 15:00 a 16:00']
        );
        Shift::updateOrCreate(
        ['id' => Shift::DE_16_A_17],
        ['description' => 'de 16:00 a 17:00']
        );
        Shift::updateOrCreate(
        ['id' => Shift::DE_17_A_18],
        ['description' => 'de 17:00 a 18:00']
         );
        Shift::updateOrCreate(
            ['id' => Shift::DE_18_A_19],
            ['description' => 'de 18:00 a 19:00']
        );



    }
}
