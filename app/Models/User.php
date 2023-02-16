<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */



    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Depende de las reglas que queramos-> si queremos que un usuario pueda reservar mas de una vez (me parece mas funcional)->
    //-> Entonces hacemos una relacion uno a muchos. Un usuario puede hacer varias reservas. Una reserva solo esta hecha por un usuario
    public function reserveS(){
        return $this->hasMany(Reserve::class,'user_id');
        //un user puede tener varias reservas
    }




}





