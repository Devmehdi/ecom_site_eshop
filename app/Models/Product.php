<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Product extends Model
{
    protected $dates = ['deleted_at'];
    use HasFactory;
}
