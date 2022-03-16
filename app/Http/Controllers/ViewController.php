<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class ViewController extends Controller
{
    /**
     * Show the index page.
     *
     * @return \Illuminate\View\View
     */
    public function view(string $view, array $data = []) : \Illuminate\View\View
    {
        //
        $data ['lang'] = config('app.locale');

        //
        $data ['route'] = Route::currentRouteName();

        return view($view, $data);
    }
}
