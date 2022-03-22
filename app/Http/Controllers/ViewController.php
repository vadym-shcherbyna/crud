<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class ViewController extends Controller
{
    /**
     * Return template with global and new vars
     *
     * @param string $view
     * @param array $data
     *
     * @return \Illuminate\View\View
     */
    public function view(string $view, array $data = []) : \Illuminate\View\View
    {
        //
        $data['lang'] = config('app.locale');

        //
        $data['route'] = Route::currentRouteName();

        return view($view, $data);
    }
}
