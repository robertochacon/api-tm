<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'id','author_id','category_id','title','description'
    ];

    public function author()
    {
    	return $this->belongsTo('App\Models\Authors', 'author_id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories', 'category_id');
    }
}
