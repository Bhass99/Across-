<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
use App\Helper;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function pages()
    {
        $category = Category::all();
        $sub_category = Category::where('parent_id', '!=' , NULL  )->get();
        $posts = Post::all();


        return view('pages.admin', compact( 'category','sub_category' , 'posts'));
    }
    /*
    public function subcategory($id){
        $category = Category::all();
        $sub_category = Category::where('parent_id', '=' , $id )->get();
        return view('pages.admin', compact('sub_category','category'));
    }
*/
    public function users()
    {
        $users = User::all();
        return view('pages.admin', compact('users'));
    }
}
