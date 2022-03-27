<?php

namespace App\Http\Controllers;

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
