<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id','post_parent_id','page_name','title','description', 'date','file' , 'image','first_li','second_li','language','posted_by','type',
    ];

 public function parent()
     {
         return $this->belongsTo(Category::class,  'id');
     }
}
