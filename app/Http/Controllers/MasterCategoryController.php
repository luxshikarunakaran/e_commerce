<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function storecat(Request $request){
        $validated_data= $request->validate([
            'category_name'=>'unique:categories|max:100|min:5',
        ]);

        Category::create($validated_data);
        //return view('store.cat');

        return redirect()->back()->with('success','Category Added Successfully!');
    }


    public function showcat($id){
        $category_info = Category::find($id);

        return view('admin.category.edit',compact('category_info'));
    }

    public function updatecat(Request $request,$id){
        $category = Category::findOrFail($id);
        $validated_data= $request->validate([
            'category_name'=>'unique:categories|max:100|min:5',
        ]);

        $category->update($validated_data);
        return redirect()->back()->with('success','Category Updated Successfully!');
    }

    public function deletecat($id){
       Category::findOrFail($id)->delete();

       return redirect()->back()->with('success','Category Deleted Successfully!');
    }
}
