<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class SessionsController extends Controller
{
    public function login()
    {
        return view('users.LoginForm');
    }

    public function dologin(Request $request)
    {
        Log::error('antes de validar');
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //$credentials = $request->only(['email', 'password']);
        Log::error('flag1');

        if (Auth::attempt($credentials)) {
            Log::error('flag2');
            // Inicio de sesión exitoso
            return redirect()->route('goto-reserve');
        }

        Log::error('flag1');

        // Inicio de sesión fallido
        return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros']);
    }
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ]);
        $validator->after(function ($validator) {
            if ($validator->errors()->has('password')) {
                $validator->errors()->add('password', 'Por favor, ingrese las contraseñas iguales');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (!$validator->passes()) {
            if ($request->password !== $request->password_confirmation) {
                $validator->errors()->add('password_confirmation', 'Las contraseñas deben ser iguales');
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('goto-reserve')->with('success', 'Password updated successfully!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('goto-Login');
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('goto-Register');
        } catch (\Exception $e) {
            Log::error("Error al eliminar usuario: {$e->getMessage()}");
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar el usuario');
        }
    }



}
