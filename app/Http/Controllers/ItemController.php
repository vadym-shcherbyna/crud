<?php

namespace App\Http\Controllers;

class ItemController extends ViewController
{
    /*
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return $this->view('admin.items.index');
    }
}
