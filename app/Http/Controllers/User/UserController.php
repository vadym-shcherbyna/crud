<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ViewController;
use App\Http\Requests\User\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UserController extends ViewController
{
    /**
     * Login Page
     *
     * @return mix
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return $this->view('user.login');
        }
    }

    /**
     * Logout View
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function auth(AuthRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withInput()->withErrors(['auth' => Lang::get('user.auth.error')]);
    }

    /**
     * Logout
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
