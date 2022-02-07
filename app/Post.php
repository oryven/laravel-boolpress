<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [

        'title',
        'author',
        'description',
        'release_date'
    ];

    public function category() {
        return $this -> belongsTo(Category::class);
    }
    
}
