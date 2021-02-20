<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Voyager;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=["comment","post_id","user_id"];

    public function Post()
    {
        return $this->belongsTo('TCG\Voyager\Models\Post');
    }
    public function User()
    {
        return $this->belongsTo('TCG\Voyager\Models\User');
    }
}
