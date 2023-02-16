<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    const COURT1 = 1;
    const COURT2 = 2;
    const COURT3 = 3;
    const COURT4 = 4;

    public function reserveS(){
        return $this->hasMany(Reserve::class,'user_id');
        //un user puede tener varias reservas
    }

}
