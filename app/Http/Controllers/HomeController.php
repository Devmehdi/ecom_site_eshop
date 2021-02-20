<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Models\sousCategory;
use App\Models\Product;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  
    function Index()
    {
        $categories=getcategories();
        $topcategories=Category::take(10)->get();
        $product=getproducts();
        $souscategories=getsousCategories();
       
        return view("auth.index",["products"=>$product,
                                   'categories'=>$categories,
                                   "topcategories"=>$topcategories,
                                   "souscategories"=>$souscategories]);
    } 
    function Index2()
    {
        $categories=getCategories();
        $topcategories=Category::take(10)->get();
        $souscategories=getsousCategories();
        $panels=DB::table("products")
        ->select('productname','price','productimage')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get();
         $counts=DB::table("products")
        ->select('productname','price')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get()->count();
        return view("auth.index2",['categories'=>$categories,'topcategories'=>$topcategories,'souscategories'=>$souscategories,'panels'=>$panels,'counts'=>$counts]);
    }

  
}
