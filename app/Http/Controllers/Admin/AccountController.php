<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ViewController;

class AccountController extends ViewController
{
    /**
     * Show the login page.
     *
     * @return \Illuminate\View\View
     */
    public function index() : \Illuminate\View\View
    {
        //
        $data = [];

        return $this->view('admin.dashboard', $data);
    }
}
