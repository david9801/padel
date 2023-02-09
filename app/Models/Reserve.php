<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'court_number',
        'email',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
        //una reserva pertenece a un solo user
    }

}
