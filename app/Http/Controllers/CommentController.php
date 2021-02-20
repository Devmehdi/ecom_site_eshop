<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;
Use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    private $post;
    private $post_id;

    public function Addcomment(Request $request)
    {
       $comment=new Comment();
       $comment->comment=$request->comment;
       $comment->user_id=auth::id();
       $comment->post_id=session("id");
       $comment->save();

       return "Ok";
    }
    public function getcommentbypost()
    {
            return CommentResource::collection(getcomments(session('id')));
    }
    public function browssePost($id)
    {
       $post=post($id);
       session(["id"=>$post->id]);
       $categories=getCategories();
       $user=getUser($post->author_id);
       $comment=getcomments($post->id);
       return  view("pages.post.showpost",['post'=>$post,'categories'=>$categories,'user'=>$user,'comment'=>$comment]);
    }
 
    public function Getpost()
    {
        $posts=Post::all();
        $categories=getCategories();
        return view("pages.post.allposts",['posts'=>$posts,'categories'=>$categories]);
    }

}
