<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index(){
        $authuserid=Auth::id();
        $stores = Store::where('user_id',$authuserid)->get();
        return view('seller.product.create',compact('stores'));
    }

    public function manage(){
        return view('seller.product.manage');
    }

    public function storeproduct(Request $request){
        $request->validate([
            'product_name'=>'required|string|max:255',
            'description'=>'nullable|string',
            'sku'=>'required|string|unique:products,sku,',
            'category_id'=>'required|exists:categories,id',
            'subcategory_id'=>'nullable|exists:subcategories,id',
            'store_id'=>'required|exists:stores,id',
            'regular_price'=>'required|numeric|min:0',
            'tax_rate'=>'required|numeric|min:0|max:100',
            'stock_quantity'=>'required|integer|min:0',
            'images'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $product = Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'sku'=>$request->sku,
            'seller_id'=>Auth::id(),
            'category_id'=> $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'store_id'=>$request->store_id,
            'regular_price'=>$request->regular_price,
            'discounted_price'=>$request->discounted_price,
            'tax_rate'=>$request->tax_rate,
            'stock_quantity'=>$request->stock_quantity,
            'slug'=> $request->slug,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
        ]);

        // Handle multiple image upload
        if($request->hasFile('images')){
            foreach($request->file('images') as $file){
                $path = $file->store('product_image','public');
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image_path'=>$path,
                    'is_primary'=>false,
                ]);
            }
        }

return redirect()->back()->with('message','Product Added Successfully');

    }
}
