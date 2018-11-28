<?php

namespace App\Http\Controllers;
namespace App\Helper;
use App\Post;
use App\Category;



    function OneAsset($key) {
        $one_category = Category::find($key);
        return $one_category->assets;

    }