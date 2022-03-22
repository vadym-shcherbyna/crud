<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UserController extends ViewController
{
    /**
     * Login Page
     *
     * @return mix
     */
    public function login() : \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return $this->view('user.login');
        }
    }

    /**
     * Login Handler
     *
     * @param LoginRequest $request
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function auth(LoginRequest $request) : \Illuminate\Http\RedirectResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            //
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withInput()->withErrors(['login' => Lang::get('user.login.error')]);
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() : \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
