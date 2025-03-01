<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{
    public function storesubcat(Request $request){
        $validated_data= $request->validate([
            'subcategory_name'=>'unique:subcategories|max:100|min:5',
            'category_id'=>'required|exists:categories,id'
        ]);

        SubCategory::create($validated_data);
        //return view('store.cat');

        return redirect()->back()->with('success','Sub Category Added Successfully!');
    }

    public function showsubcat($id){
        $subcategory_info = Subcategory::find($id);

        return view('admin.sub_category.edit',compact('subcategory_info'));
    }

    public function updatesubcat(Request $request,$id){
        $subcategory = Subcategory::findOrFail($id);
        $validated_data= $request->validate([
            'subcategory_name'=>'unique:subcategories|max:100|min:5',
        ]);

        $subcategory->update($validated_data);
        return redirect()->back()->with('success','Sub Category Updated Successfully!');
    }

    public function deletesubcat($id){
       Subcategory::findOrFail($id)->delete();

       return redirect()->back()->with('success','Sub Category Deleted Successfully!');
    }
}
