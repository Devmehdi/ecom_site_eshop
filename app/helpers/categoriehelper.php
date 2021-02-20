<?php

use App\Models\SousCategory;
use TCG\Voyager\Models\Category;


    //get categories
    function getCategories()
    {
        $categories=Category::wherenull('deleted_at')->get();
        return $categories;
    } 
   
    //get sous categories
    function getsousCategories()
    {
        $categories=SousCategory::wherenull('deleted_at')->get();
        return $categories;
    } 