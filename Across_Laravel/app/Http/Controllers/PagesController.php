<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth', ['except' => ['login']]);

    }
    public function index(){
        $category = Category::all();
        return view('pages.index', compact( "category"));
    }
    public function ShowCategory($id){
        $index = false;
        if($id == 4){
            $index = true;
        }
        $category = Category::all();
        $one_category = Category::find($id);
        $assets = $one_category->assets;
        $children = $one_category->children;
        $parent = $one_category->parent;
        $id_category = Category::find($id);
        if ($parent->name == "Core Rescurces") {
            return redirect("/sub_category/" . $children->first()->parent_id . '/'. $children->first()->id);
        }elseif ($parent->name == "Understanding Lojuxta"){

            return redirect("/sub_category/" . $children->first()->parent_id . '/'. $children->first()->id);
        }
        else{
        return view('pages.content' , compact('assets' ,'children','parent','category','one_category', 'index','id_category','id'));
        }
    }
    public function sub_category($patent_id , $id ){
        $index = false;
        $category = Category::all();
        $parent_id_category = Category::find($patent_id);
        $id_category = Category::find($id);
        $assets = $id_category->assets;
        $children = $parent_id_category->children;

        if($id_category->name == 'FAQs'){
            $index = true;
        }
        $parent = $parent_id_category->parent;
        return view('pages.content' , compact(  'children','parent','category' , 'assets' , 'index','id_category' ));
    }
    public function login(){
        if (Auth::check()) {
            return redirect('/index');
        }else{
            return view('pages.login');
        }
    }
    public function register(){
        return view('pages.register');
    }
    /*
    public function libary(){
        $posts = Post::all();
        $category = Category::all();
        return view('pages.libary');
    }
    public function news($id){
        $posts = Post::all();
        $category = Category::all();
        $one_category = Category::find($id);
        return view('pages.news', compact("posts" , "one_category" , 'category'));
    }
     public function coreRescources(){
        $posts = Post::all();
        $category = Category::all();
        return view('pages.coreRescources',  compact("posts","category"));
    }
      public function coreRescources2(){
        $posts = Post::all();
        $category = Category::all();
        return view('pages.coreRescources2', compact( "posts","category"));
    }

    public function objection(){
        $posts = Post::all();
        $category = Category::all();
        return view('pages.objection',  compact("posts" ,"category"));
    }
    public function understanding(){
        $posts = Post::all();
        $category = Category::all();
        return view('pages.understanding',compact("posts", "category"));
    }
    */




}
