<?php

namespace App\Http\Controllers;

use App\Http\Resources\precommandeResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SousCategory;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;
use Session;
use App\Models\precommande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    
    public function allproduct()
    {
        return ProductResource::collection(getproducts());
    }
    public function shopgrid()
    {
        $categories=getCategories();
        $products=getproducts();
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
                                 
        return view("pages.product.shopgrid",['categories'=>$categories,'products'=>$products,'panels'=>$panels,'counts'=>$counts]);
    }
    public function getviewproduct(Request $request)
    {
        $userip=Precommande::where('useripadresse' , '=' , $request->ip())->get();
        $user_id=Precommande::where('user_id' , '=' , Auth::id())->get();
        
        $categories=getCategories();
        $souscategories=getsousCategories();
        if($userip != null && count($user_id)<=0)
        {
            $panels=DB::table("products")
            ->select('productname','price','productimage')
            ->join('precommandes','product_id','=','products.id')
            ->where('useripadresse' , '=' , $request->ip())->get();
            $counts=DB::table("products")
            ->select('productname','price')
            ->join('precommandes','product_id','=','products.id')
            ->where('useripadresse' , '=' , $request->ip())->get()
            ->count();
           
        }
        elseif($userip != null && $user_id!=null)
        {
            $panels=DB::table("products")
            ->select('productname','price','productimage')
            ->join('precommandes','product_id','=','products.id')
            ->get();
            $counts=DB::table("products")
            ->select('productname','price')
            ->join('precommandes','product_id','=','products.id')
            ->get()->count();
        }
        elseif(count($userip) <= 0 && $user_id!=null)
        {
           $panels=panel(Auth::id(),$request->ip());
           
        }
        return view("pages.product.product",["categories"=>$categories,"souscategories"=>$souscategories,'panels'=>$panels,'counts'=>$counts]);
    }
    public function cart(Request $request)
    {
        $categories=getProducts();
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
        return view("pages.product.cart",['categories'=>$categories,'panels'=>$panels,'counts'=>$counts]);
        /*$var= $request->ip();
        return $var;*/
    }
    public function checkout()
    {
        $categories=getProducts();
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
        return view("pages.product.checkout",['categories'=>$categories,'panels'=>$panels,'counts'=>$counts]);
    }
    public function addtocart(Request $request)
    {
        $precommande=new PreCommande();
        if(Auth::id()>0)
        {
            $precommande->product_id=$request->productid;
            $precommande->user_id=Auth::id();
            $precommande->active_flage=1;
            $precommande->save();
        }
        else
        {
            $precommande->product_id=$request->productid;
            $precommande->useripadresse=$request->ip();
            $precommande->active_flage=1;
            $precommande->save();
        }
       
        return dd(Precommande::where('useripadresse','=',$request->ip())->get());
    }

    public function blog(Request $request)
    {
        
        $categories=getCategories();
       
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
            return view("pages.posts.posts",['categories'=>$categories,'panels'=>$panels,'counts'=>$counts]);
       
       
    }
    public function Browssepost()
    {
        $categories=getCategories();
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
       return view("pages.posts.blog",['categories'=>$categories,'panels'=>$panels,'counts'=>$counts]);
    }
    public function createpost(Request $request)
    {
       $post=new Post();

       $post->title=$request->title;
       $post->author_id=1;
       $post->body=$request->description;
       $post->status="PENDING";
       $post->save();

       return response()->json("done",200);
    }
 
     public function datacat()
     {
         return getCategories();
     }
     
     public function datapro()
     {
         return getProducts();
     }
     public function filterproduct(Request $request)
     {
        $number=$request->value;
        return ProductResource::collection(filterproduct($number));
     }
     public function getpanels(Request $request)
     {
         return precommandeResource::collection(panel(Auth::id(),$request->ip()));
     }
     public function getcounts(Request $request)
     {
         return precommandeResource::collection(calccount(Auth::id(),$request->ip()));
     }
     public function destroy($id)
     {
         $model=new precommande;
         return delete($model,$id);
     }

}
