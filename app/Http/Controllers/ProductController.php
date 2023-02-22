<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Images\UsersImages;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $products = Product::all();
        return view('products.productsUser' ,compact('products','categories' ,'sub_categories'));
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('products.productsUser' ,compact('products'));
    }

    
   
    // public function getProduct($id){
    //     echo 'ahlan get pro';die;
    //     $product = DB::table('products')->where('id',$id)->all();
    //     return json_encode($product);
    // }

    public function getSubCategory($id){
        $subCategory = DB::table('sub_categories')->where('category_id',$id)->pluck('name' , 'id');
        return json_encode($subCategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }
    // public function productDetails()
    // {
    //     echo 'ahlan details';die;

    //     $products = Product::all();
    //     return view('products.productsUser' ,compact('products'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // return $request;die;
        $validated = $request->validate([
            'name' => 'required|string|unique:products|max:255',
            'details' => 'required|string|max:255',
            'image' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|max:255',
        ]);

        $file_extension = $request->image->getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path = 'Images/users';
        $request->image->move($path , $file_name );

            Product::create([
                'name' => $request->name,
                'details' => $request->details,
                'image' => $file_name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'created_by' => (Auth::user()->name),
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id
            ]);
            UsersImages::create([
                'name' => $request->image,
                'user_id'=>(Auth::user()->id)

            ]);

           
                
        session()->flash('Add' , 'Add Product Success');
        return redirect('/products');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // return $request;die;
        $category_id = Category::where('name' , $request->category_name )->first()->id;
        $sub_category_id = SubCategory::where('name' , $request->sub_category_name )->first()->id;
        $validated = $request->validate([
            'name' => 'required|max:255|unique:products,name,'.$request->id,
            'details' => 'required|max:255',
            'image' => 'required|max:255',
            'status' =>'in:0,1',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric'
        ]);

        $product = Product::find($request->id);
        $product->update([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $request->image,
            'status' => $request->status,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $category_id,
            'sub_category_id' => $sub_category_id
        ]);

        session()->flash('Edit' , 'Edit Product Success');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        session()->flash('Delete' , 'Product Deleted Success');
        return redirect('/products');
    }
}
