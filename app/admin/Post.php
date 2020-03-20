<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

	public function category()
	{
		return $this->belongsTo(Categories::class, 'categories_id');
	} 
}
