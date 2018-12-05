<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'id','parent_id','language','file'
    ];


    public function parent()
    {
        return $this->belongsTo(post::class,  'id');
    }
}
