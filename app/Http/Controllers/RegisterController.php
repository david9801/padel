<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    public function create(){
        return view('users.RegisterForm');
    }
    public function store(Request $request)
    {
        //valido el registro;
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|unique:users,name',
            'email' => 'sometimes|required|email|unique:users,email',
            'password' => 'sometimes|required|max:30'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //defino los roles admin y user
        //una vez creado un usuario comento las 2 siguientes lineas, seria parecido a usar tinker
        //Role::create(['name' => 'admin']);
        //Role::create(['name' => 'cliente']);
        //para usar los roles:
        //composer require spatie/laravel-permission
        //creo la tabla php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
        //php artisan migrate
        //y luego
        //php artisan make:seeder RolesTableSeeder creo la tabla roles y asigno los roles
        //php artisan db:seed --class=RolesTableSeeder
        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        //asigno roles a los registros-> un admin y el resto users
        //asignar rol
        //$user->assignRole('admin');
        if((Str::endsWith($user->email, 'admin.com'))||(Str::endsWith($user->email, 'admin.es') )) {
            $user->assignRole('admin');
        }
        else {
            $user->assignRole('cliente');
        }
        Log::error('error10');
        auth()->login($user);
        return redirect()->route('verification.notice');
    }
}
