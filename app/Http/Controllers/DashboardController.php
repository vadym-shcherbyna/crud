<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ViewController;

class DashboardController extends ViewController
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
