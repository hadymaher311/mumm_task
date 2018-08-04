<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category()
    {
    	return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class)->latest();
    }
}
