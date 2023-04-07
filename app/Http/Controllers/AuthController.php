<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function viewLoginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, true)) {

            $user = User::where('email', 'LIKE', $credentials['email'])->first();

            Session::put(
                'userSession',
                ['email' => $credentials['email'], 'password' => $user->password]
            );

            if ($request->rememberMe) {
                Cookie::queue('userEmail', $credentials['email'], 10080);
                Cookie::queue('userPassword', $credentials['password'], 10080);
            }

            return redirect('/home');
        }

        return back()->with('loginError', 'Wrong credentials!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
