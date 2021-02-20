<?php

use App\Models\Product;
use App\Models\SousCategory;
use TCG\Voyager\Models\Post;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Category;

use App\Models\Precommande;

    global $post;
    function post($id)
    {
        $post=Post::findorfail($id);
        return $post;
    }
    //Get ip of the user  
    function getIp(){
      foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
        return request()->ip();
    }
    function myIp($ip)
    {
       return Precommande::where('useripadresse','=',$ip)->get();
    }

}