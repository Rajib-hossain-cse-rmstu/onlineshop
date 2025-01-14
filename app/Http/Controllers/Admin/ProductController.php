<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {   
        //changin 
        $products = Product::with('category', 'subcategory', 'brand', 'images')->get();
        // dd($products);
        return view('backend.admin.product.index', compact('products',));
    }
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNull('is_parent')->get();
        $brands = Brand::all();
        return view('backend.admin.product.create', compact('categories', 'brands', 'subcategories'));
    }
    public function store(Request $request)
    { 
        // dd($request);
        $request->validate([
            'product_name' => 'string|required',
            'product_description' => 'string|required',
            'product_summary' => 'string|required',
            'product_category' => 'nullable', 
            'product_sub_category'=>'nullable',
            'product_brand'=>'nullable',
            'product_quantity'=>'numeric|required',
            'product_price'=>'numeric|required',
            'status' => 'required',
            'product_weight' => 'numeric|required',
            'feature_product' => 'nullable',
        ]);

        $new_product = Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_summary' => $request->product_summary,
            'product_category' => $request->product_category,
            'product_sub_category' => $request->product_sub_category,
            'product_brand' => $request->product_brand,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'feature_product' => $request->feature_product,
            'status' => $request->status,
        ]);
        if($request->has('images')){
            foreach($request->file('images')as $image){
                $imageName = uniqid('product_image_' . strtotime(date('Ymdhmis')), true) . '.' .rand(1, 1000) . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/product_images'),$imageName);
                Image::create([
                    'product_id'=>$new_product->id,
                    'image'=>$imageName
                ]);
            }
        }
        if($new_product){
            Toastr::success('Product Successfully Created :)', 'Created', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.product.list');
        }else{
            Toastr::error('Something Wrond (:', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.product.list');
        }

    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNull('is_parent')->get();
        $brands = Brand::all();
        $images = $product->images;
        return view('backend.admin.product.edit', compact('categories', 'brands', 'subcategories', 'product', 'images')); 
    }

    public function update(Request $request, $id){
        $product = Product::find($id);

        $request->validate([
            'product_name' => 'string|nullable',
            'product_description' => 'string|nullable',
            'product_summary' => 'string|nullable',
            'product_category' => 'nullable', 
            'product_sub_category'=>'nullable',
            'product_brand'=>'nullable',
            'product_quantity'=>'numeric|nullable',
            'product_price'=>'numeric|nullable',
            'status' => 'nullable',
            'product_weight' => 'numeric|nullable',
            'feature_product' => 'nullable',
        ]);

         $product -> update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_summary' => $request->product_summary,
            'product_category' => $request->product_category,
            'product_sub_category' => $request->product_sub_category,
            'product_brand' => $request->product_brand,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'feature_product' => $request->feature_product,
            'status' => $request->status,
        ]);
   
            // $product->images()->delete();
            if($request->hasFile('images')){
                $product->images()->delete();
            foreach($request->file('images') as $image){
                $imageName = uniqid('product_image_' . strtotime(date('Ymdhmis')), true) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/product_images'),$imageName);
                Image::create([
                    'product_id'=>$product->id,
                    'image'=>$imageName
                ]);
            }
        }
        

        if($product->update([])){
            Toastr::success('Product Successfully Updated :)', 'Updated', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.product.list');
        }else{
            Toastr::error('Something Wrond (:', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.product.list');
        }
    }

    public function show($id)
    {
        $product = Product::with('category', 'subcategory', 'brand')->find($id);
        $images = $product->images;
        if($product){
            Toastr::success('Product Found :)', 'Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return view('backend.admin.product.show', compact('product', 'images'));
        }else{
            Toastr::error('Something Wrond (:', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return view('backend.admin.product.show', compact('product', 'images'));
        }
    }
    public function delete($id){
        $product = Product::find($id);
        $product->images()->delete();
        $delete = Product::find($id)->delete();
        if($delete){
            Toastr::error('Product successfully Deleted :)', 'Delete', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back();
        }else{
            Toastr::warning('Something Wrond (:', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back();
        }


    }
}
