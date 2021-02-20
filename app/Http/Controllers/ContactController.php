<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class ContactController extends Controller
{
    function getcontact()
    {
        $categories=Category::all();
        return view("pages.contact",['categories'=>$categories]);
    }
}
