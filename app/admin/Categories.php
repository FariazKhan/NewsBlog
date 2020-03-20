<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
