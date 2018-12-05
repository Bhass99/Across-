<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\File;
use Illuminate\Support\Facades\Auth;
use App\Category;
use phpDocumentor\Reflection\Project;
use App\User;




class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }

    public function create(Request $request)
    {
        $category = Category::all();
        $PageId = $request->input('cid');



        $categoryId = Category::find($PageId);

        $parent_id =  $categoryId->parent_id;

         $children =   Category::Where('parent_id', '=', $parent_id)->get();


        if( count($children) > 1 &&  $category[1]->id == $children[1]->parent_id && $children[1]->id == $PageId  ){
           return view('faq/create' , compact('PageId'));

        }else{
            return view('posts.create' , compact('category','PageId'));
        }


    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'post_parent_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'date' => 'nullable',
                'image' => 'nullable',
                'first_li' => 'nullable',
                'second_li' => 'nullable',
                'type' => 'nullable'
            ]
        );

        $post = new Post($request->all('post_parent_id' , 'title' , 'description' ,'date','image','first_li','second_li'));
                    $imagename = request('image');
        $NoExtImage = pathinfo($imagename->getClientOriginalname(), PATHINFO_FILENAME);
        $extensionImage = $imagename->getClientOriginalExtension();
        $ImageNameToStore = $NoExtImage . '_' . time() . '.' . $extensionImage;
        request('image')->storeAs('public/uploads',$ImageNameToStore);
        $post-> image = $ImageNameToStore;
        $post-> posted_by = Auth::user()->email;
        $post->save();






        $files = $request->file;

        foreach (['de', 'en','nl','es','it'] as $locale){

            if($request->hasFile('file-'.$locale)){

                $fileData = new File($request->all('de', 'en','nl','es','it'));
                dd($fileData);
                $fileData->parent_id = $post->id;
                $TheFile = $request->file('file-'.$locale);
                $extension = $TheFile->getClientOriginalExtension();
                $fileData->file = $extension;
                $fileData->save();
                $fileNameToStore = $fileData->id.'.'.$extension;
            }



        //    $fileData = new File($request->all('parent_id','language','file'));



          //

           // $fileNameToStore = $NoExt . '_' . time() . '.' . $extension;

       //     $filename->storeAs('public/uploads',$fileNameToStore);

        //    $post->file = $fileNameToStore;
            //dd($filename);
         //   $fileData->save();

        }







        return redirect('/adminpages' )->with('success', 'Post is successfully created!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $posts = Post::find($id);
        return view('posts.edit' , compact('posts'));
    }


    public function update(Request $request ,Post $post)
    {

        $this->validate($request,
            [
                'post_parent_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'file' => 'nullable',
                'image' => 'nullable',
                'first_li' => 'nullable',
                'second_li' => 'nullable',
                'language' => 'required',
                'type' => 'required'
            ]
        );
        $post->fill($request->all());

        $filename = request('file');
        if($filename){
            $NoExt = pathinfo( $filename->getClientOriginalname(), PATHINFO_FILENAME);
            $extension = $filename->getClientOriginalExtension();
            $fileNameToStore = $NoExt . '_' . time() . '.' . $extension;
            request('file')->storeAs('public/uploads',$fileNameToStore);

        }else{
            $fileNameToStore = $post->file;
        }
        $post->file = $fileNameToStore;

        $imagename = request('image');
        if($imagename){
            $NoExtImage = pathinfo($imagename->getClientOriginalname(), PATHINFO_FILENAME);
            $extensionImage = $imagename->getClientOriginalExtension();
            $ImageNameToStore = $NoExtImage . '_' . time() . '.' . $extensionImage;
            request('image')->storeAs('public/uploads',$ImageNameToStore);
        }else{
            $ImageNameToStore = $post->image;
        }

        $post-> image = $ImageNameToStore;

        $post-> posted_by = Auth::user()->email;

        $post->save();
        return redirect('/adminpages' )->with('success', 'Post is successfully edited!');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/adminpages')->with('success', 'Post is successfully deleted!');
    }

    public function download($file)
    {
        return response()->download(storage_path('app/public/uploads/' . $file));

    }
}
