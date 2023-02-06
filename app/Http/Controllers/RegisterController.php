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
        Log::error('error1');
        //valido el registro;
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|unique:users,name',
            'email' => 'sometimes|required|email|unique:users,email',
            'password' => 'sometimes|required|max:30'
        ]);
        Log::error('error2');

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Log::error('error3');
        //defino los roles admin y user
        //una vez creado un usuario comento las 2 siguientes lineas, seria parecido a usar tinker
        //Role::create(['name' => 'admin']);
        //Role::create(['name' => 'cliente']);
        //para usar los roles:
        //composer require spatie/laravel-permission
        //creo la tabla create_permission_tables
        //php artisan migrate
        //y luego
        //php artisan make:seeder RolesTableSeeder creo la tabla roles y asigno los roles
        //php artisan db:seed --class=RolesTableSeeder
        $user=new User();
        Log::error('error4');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        Log::error('error5');
        $user->save();
        Log::error('error6');
        //asigno roles a los registros-> un admin y el resto users
        //asignar rol
        //$user->assignRole('admin');
        if((Str::endsWith($user->email, 'admin.com'))||(Str::endsWith($user->email, 'admin.es') )) {
            $user->assignRole('admin');
        }
        else {
            $user->assignRole('cliente');
        }
        //me logueo al registrarme
        Log::error('error10');
        auth()->login($user);
        return redirect()->route('welcome');
    }
}
