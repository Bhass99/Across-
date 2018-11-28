<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [ 'id','parent_id','name','title','description','small_title','category_logo','category_title','type'  ];

    public function parent()
    {
        return $this->belongsTo(Category::class,  'id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function assets(){
        return $this->hasMany(Post::class, 'post_parent_id');
    }

}
