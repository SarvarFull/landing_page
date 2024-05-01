<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function registerPage()
    {
        return view("landing.register");
    }

    public function signUp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && strlen($request->password) > 4) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Session::put('user', $user);
            return redirect()->route('main.page');
        } else if (!$user) {
            $user = user::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Session::put('user', $user);
            return redirect()->route('main.page');
        } else {
            return redirect()->route('main.page');
        }
    }

    public function signIn(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return redirect()->route('main.page');
        } else {
            return redirect()->route('register.page');
        }
    }

    public function signOut()
    {
        Session::forget('user');

        return redirect()->route('main.page');
    }
}
