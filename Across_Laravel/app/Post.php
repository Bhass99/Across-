<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id','post_parent_id','page_name','title','description', 'date','file' , 'image','first_li','second_li','language','posted_by','type','is_highlighted',
    ];

 public function parent()
     {
         return $this->belongsTo(Category::class,  'id');
     }

      public function file(){
             return $this->hasMany(File::class, 'parent_id');
         }
}
