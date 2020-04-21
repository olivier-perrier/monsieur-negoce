<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function path()
    {
        return route("articles.show", $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
