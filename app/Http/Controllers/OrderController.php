<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class OrderController extends Controller
{
    function checkout()
    {
        $categories=Category::all();
        return view("pages/checkout",['categories'=>$categories]);
    }
}
