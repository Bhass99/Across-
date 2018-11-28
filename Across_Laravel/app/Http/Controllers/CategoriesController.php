<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Route;

class CategoriesController extends Controller
{

    public function create()
    {
        $category = Category::all();
        return view('Category.create' , compact('category'));
    }

    public function store(Request $request)
    {

        $this->validate($request,
            [
                'parent_id' => 'nullable',
                'name' => 'required',
                'title' => 'nullable',
                'description' => 'nullable',
                'category_logo' => 'nullable',
            ]
        );

        $category = new Category($request->all());

        $category_logo = request('category_logo');
        $NoExtImage = pathinfo($category_logo->getClientOriginalname(), PATHINFO_FILENAME);
        $extensionImage = $category_logo->getClientOriginalExtension();
        $ImageNameToStore = $NoExtImage . '_' . time() . '.' . $extensionImage;
        request('category_logo')->storeAs('public/uploads',$ImageNameToStore);
        $category->category_logo = $ImageNameToStore;

        $category->save();
        return redirect('/adminpages' );
    }

    public function edit(Category $category)
    {
        return view('Category.edit' , compact('category'));
    }


    public function update(Category $category)
    {
        $category->name = request('name');
        $category->title = request('title');
        $category->description = request('description');
        if(request('category_logo') == null){
            $ImageNameToStore = $category->category_logo;
        }else{
            $category_logo = request('category_logo');
            $NoExtImage = pathinfo($category_logo->getClientOriginalname(), PATHINFO_FILENAME);
            $extensionImage = $category_logo->getClientOriginalExtension();
            $ImageNameToStore = $NoExtImage . '_' . time() . '.' . $extensionImage;
            request('category_logo')->storeAs('public/uploads',$ImageNameToStore);
        }
        $category->category_logo = $ImageNameToStore;
        $category->save();
        return redirect('/adminpages' );

    }


    public function destroy(Category $category )
    {
        $category->delete();
        return redirect('/adminpages');
    }
}
