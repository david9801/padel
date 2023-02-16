<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'day',
        'shift_id',
        'user_id',
        'pista_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
        //una reserva pertenece a un solo user
    }
    public function shift(){
        return $this->belongsTo(Shift::class,'shift_id');
        //una reserva pertenece a un solo turno (shift)
    }
    public function pista(){
        return $this->belongsTo(Pista::class,'pista_id');
        //una reserva pertenece a un solo turno (shift)
    }


}
