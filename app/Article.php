<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();;
    }
}
