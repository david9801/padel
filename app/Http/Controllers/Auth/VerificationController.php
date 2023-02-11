<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\User;

class VerificationController extends Controller
{
    public function show()
    {
        return view('emails.verify');
    }

    public function verify($id)
    {
        $user = User::findOrFail($id);

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        return redirect()->route('welcome');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('welcome');

        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
