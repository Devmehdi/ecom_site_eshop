<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    private static $id;
    function login(Request $request)
    {
        return view("pages.auth.Login");
    }
    function register()
    {
        return view("pages.auth.register");
    }
    function createAccount(Request $request)
    {
       $user=user::where("email",$request->email)->first();
       if(isset($user->id))
       {
          return response()->json(['error'=>'email already exists.']);
       }

        $user=new User();
        $user->name=request()->name;
        $user->email=request()->email;
        $user->password=bcrypt(request()->password);
        $user->role_id=2;
        $user->save();

        Auth::login($user);

      return "Ok";
       /* $account = new User();
        $account -> name  = $req->input('name');
        $account -> email = $req->input('email');
        $account -> password  = $req->input('password');
        $account -> role_id = 2;

        $account->save();

        return Redirect("http://localhost:8000/login");*/
    }
    function Checklogin(Request $request)
    {
       if(Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
        { 
            $id=session()->put('user_id', Auth::id());
            session('id',$id);
            return Redirect()->route('index');
        }
        else
        {
            return response()->json(["error"=>"your Email or password is incorrect"],401);
        }

      /*  $checked=DB::table('users')->where(['email'=>$request->input('email'),'password'=>$request->input('password')])->get();
        $user_id=DB::table('users')->where(['email'=>$request->input('email'),'password'=>$request->input('password')])->first();
       
       if(count($checked)>0)
        {
            $request->session()->put('user_id', $user_id->id);
            return redirect()->route('index');
        }
        else
        {
            echo 'echec';
        }*/
    }
}
