<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\File;

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
        $category = Category::all();
        $index = 0;
        if(count($category)> 0 && isset( $category[3]->id) && $category[3]->id == $id ){
            $index = 1;
        }
        $one_category = Category::find($id);
        $assets = $one_category->assets()->orderBy('created_at', 'desc')->paginate(10);
        $children = $one_category->children;
        $parent = $one_category->parent;



        if(count($children)> 0){
            if ($category[1]->id == $one_category->id   ) {
                return redirect("/sub_category/" . $children->first()->parent_id . '/'. $children->first()->id);
            }elseif ($category[2]->id == $one_category->id){

                return redirect("/sub_category/" . $children->first()->parent_id . '/'. $children->first()->id);
            }
            else{
                return view('pages.content' , compact('assets' ,'children','parent','category','one_category', 'index','id'));
            }
        }else{
            return view('pages.content' , compact('assets' ,'children','parent','category','one_category', 'index','id'));
        }
    }
    public function sub_category($patent_id , $id ){
        $faqs = 0;
        $indexColor = '';
        $category = Category::all();
        $parent_id_category = Category::find($patent_id);
        $id_category = Category::find($id);
        $assets = $id_category->assets()->orderBy('created_at', 'desc')->paginate(10);
        $children = $parent_id_category->children;
        if($id_category->name == 'FAQs'){
            $faqs = 1;
        }

        $block = Category::whereNull('parent_id')->get();
        $parent = $parent_id_category->parent;
        return view('pages.content' , compact(  'children','parent','category' , 'assets' , 'faqs','id_category', 'id','parent_id_category','block'));
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
}
