<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class SecondCategoryController extends Controller
{



    public function create(Request $request)
    {
       $PageId = $request->input('cid');
       $PageName = Category::find($PageId)->name;
        $category = Category::all();

        if($PageName == 'News and Updates' || $PageName =='HoFH Libary' || $PageName =='Objection Handlers'){
            return view('posts/create' , compact('PageId','category'));
        }
        return view('SecondCategory.create' , compact("category" , "PageId"));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('secondcategory.edit' , compact('category'));
    }


    public function update($id)
    {
        $category = Category::find($id);
        $category->name = request('name');
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


    public function destroy(SecondCategory $category )
    {
        $category->delete();
        return redirect('/adminpages');
    }

}
