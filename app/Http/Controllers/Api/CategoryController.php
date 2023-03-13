<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;

class CategoryController extends Controller
{
    /*
     * Category Index
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index() : \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => Item::CATEGORIES]);
    }
}
