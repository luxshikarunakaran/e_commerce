<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index(){
        $allattributes = DefaultAttribute::all();
        return view('admin.product_attribute.create',compact('allattributes'));
    }

    public function manage(){
        $allattributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage',compact('allattributes'));
    }

    public function createattribute(Request $request){
        $validated_data= $request->validate([
            'attribute_value'=>'unique:default_attributes|max:100',
        ]);

        DefaultAttribute::create($validated_data);
        //return view('store.cat');

        return redirect()->back()->with('success','Default Attribute Added Successfully!');
    }

    public function showattribute($id){
        $attribute_info = DefaultAttribute::find($id);

        return view('admin.product_attribute.edit',compact('attribute_info'));
    }

    public function updateattribute(Request $request,$id){
        $attribute = DefaultAttribute::findOrFail($id);
        $validated_data= $request->validate([
            'attribute_value'=>'unique:default_attributes|max:100|min:1',
        ]);

        $attribute->update($validated_data);
        return redirect()->back()->with('success','Attribute  Updated Successfully!');
    }

    public function deleteattribute($id){
        DefaultAttribute::findOrFail($id)->delete();

       return redirect()->back()->with('success','Attribute  Deleted Successfully!');
    }
}
