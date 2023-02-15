<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    const DE_9_A_10 = 1;
    const DE_10_A_11 = 2;
    const DE_11_A_12 = 3;
    const DE_12_A_13 = 4;
    const DE_13_A_14 = 5;
    const DE_14_A_15 = 6;
    const DE_15_A_16 = 7;
    const DE_16_A_17 = 8;
    const DE_17_A_18 = 9;
    const DE_18_A_19 = 10;

    public function reserveS(){
        return $this->hasMany(Reserve::class,'user_id');
        //un turno puede tener varias reservas
    }


}
