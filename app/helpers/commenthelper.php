<?php

use App\Models\Comment;
use TCG\Voyager\Models\Post;
use App\Models\User;

 //Get all comment from table comments
 function getcomments($post_id)
 {
     return Comment::all(); 
 }
 function getByPost($post_id)
 {
    $comment=Comment::where('post_id','=',$post_id);
    return $comment;
 }
 function getUser($id)
 {
     $user=User::find($id);
     return $user;
 }