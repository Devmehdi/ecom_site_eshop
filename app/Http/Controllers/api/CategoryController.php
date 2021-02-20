<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class CategoryController extends Controller
{
    public function getallcategorie()
    {
        return CategoryResource::collection(Category::all());
    }
}
