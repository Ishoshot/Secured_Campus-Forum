<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class)->latest();
    }  

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
