<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Category;
use phpDocumentor\Reflection\Project;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = Category::all();
        $PageId = $request->input('cid');
        if($PageId == 8){
           return view('faq/create' , compact('PageId'));
        }

        return view('posts.create' , compact('category','PageId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
            [
                'post_parent_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'file' => 'nullable',
                'image' => 'required',
                'first_li' => 'nullable',
                'second_li' => 'nullable',
                'language' => 'required',
                'type' => 'required'
            ]
        );

        $post = new Post($request->all());

        $filename = request('file');
        if($filename){
            $NoExt = pathinfo( $filename->getClientOriginalname(), PATHINFO_FILENAME);
            $extension = $filename->getClientOriginalExtension();
            $fileNameToStore = $NoExt . '_' . time() . '.' . $extension;
            request('file')->storeAs('public/uploads',$fileNameToStore);
            $post->file = $fileNameToStore;
        }


        $imagename = request('image');
        $NoExtImage = pathinfo($imagename->getClientOriginalname(), PATHINFO_FILENAME);
        $extensionImage = $imagename->getClientOriginalExtension();
        $ImageNameToStore = $NoExtImage . '_' . time() . '.' . $extensionImage;
        request('image')->storeAs('public/uploads',$ImageNameToStore);
        $post-> image = $ImageNameToStore;

        $post-> posted_by = Auth::user()->email;
        $post->save();
        return redirect('/adminpages' )->with('success', 'Post is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('posts.edit' , compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Post $post)
    {

        $this->validate($request,
            [
                'post_parent_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'file' => 'nullable',
                'image' => 'required',
                'first_li' => 'nullable',
                'second_li' => 'nullable',
                'language' => 'required',
                'type' => 'required'
            ]
        );

        $filename = request('file');
        if($filename){
            $NoExt = pathinfo( $filename->getClientOriginalname(), PATHINFO_FILENAME);
            $extension = $filename->getClientOriginalExtension();
            $fileNameToStore = $NoExt . '_' . time() . '.' . $extension;
            request('file')->storeAs('public/uploads',$fileNameToStore);
            $post->file = $fileNameToStore;
        }


        $imagename = request('image');
        $NoExtImage = pathinfo($imagename->getClientOriginalname(), PATHINFO_FILENAME);
        $extensionImage = $imagename->getClientOriginalExtension();
        $ImageNameToStore = $NoExtImage . '_' . time() . '.' . $extensionImage;
        request('image')->storeAs('public/uploads',$ImageNameToStore);
        $post-> image = $ImageNameToStore;

        $post-> posted_by = Auth::user()->email;
        $post->fill($request->all());

        $post->save();
        return redirect('/adminpages' )->with('success', 'Post is successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/adminpages')->with('success', 'Post is successfully deleted!');
    }

    public function download($file)
    {
        dd("test");
        return response()->download(storage_path('app/public/uploads/' . $file));

    }
}
