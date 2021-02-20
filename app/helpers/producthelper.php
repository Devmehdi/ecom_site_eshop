<?php


use App\Models\Product;
use App\Models\Precommande;



//Get count product for using in panel product 
function calccount($id,$ip)
{
    $userip=Precommande::where('useripadresse' , '=' , $ip)->get();
    $user_id=Precommande::where('user_id' , '=' , $id)->get();
    
    $categories=getCategories();
    $souscategories=getsousCategories();
    if($userip != null && count($user_id)<=0)
    {
        $counts=Product::join('precommandes','product_id','=','products.id')
        ->where('useripadresse' , '=' , $ip)->get();
    }
    elseif($userip != null && $user_id!=null)
    {
        $counts=Product::join('precommandes','product_id','=','products.id')
        ->get();
    }
    elseif(count($userip) <= 0 && $user_id!=null)
    {
        $panels=Product::join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get();
    }
    return $counts;
}
//Get product from table preommande
function panel($id,$ip)
{
    $userip=Precommande::where('useripadresse' , '=' , $ip)->get();
    $user_id=Precommande::where('user_id' , '=' , $id)->get();
   /* $panels=DB::table("products")
    ->select('productname','price','productimage')
    ->join('precommandes','product_id','=','products.id')
    ->join('users','users.id','=','precommandes.user_id')
    ->get();*/
    if($userip != null && count($user_id)<=0)
    {
        $panels=Product::join('precommandes','product_id','=','products.id')
        ->where('useripadresse' , '=' , $ip)->get();   
    }
    elseif($userip != null && $user_id!=null)
    {
        $panels=Product::join('precommandes','product_id','=','products.id')
        ->where('precommandes.user_id',"=",$id)
        ->get();
    }
    elseif(count($userip) <= 0 && $user_id!=null)
    {
        $panels=Product::join('precommandes','product_id','=','products.id')
         ->join('users','users.id','=','precommandes.user_id')
         ->where('useripadresse' , '=' , $ip)
         ->get();
    }
   
   return $panels;
}
  //delete row from model
function Delete($model,$id)
{
    $Product=$model::find($id);

    if($Product->Delete())
    {
        return "OK";
    }
    else
    {
        return response()->json(['Product not dropped'],425);
    }
}
 //get product from table product
function getProducts()
{
     $products=Product::wherenull('deleted_at')->get();
     return $products;
}
 //Get product for using on pagination
function filterproduct($number)
{
    return Product::take($number)->get();
}
function sortByProduct()
{
    
}