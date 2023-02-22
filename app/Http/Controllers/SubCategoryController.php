<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $sub_categories =SubCategory::all();
        return view('sub_category.sub_category',compact('sub_categories' , 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;die;
        $validate = $request->validate([
            'name' => 'required|unique:sub_categories|max:255',
            'describtion' => 'required|max:255',
            'image' => 'required|max:255',
        ]);

        SubCategory::create([
            'name' => $request->name,
                'describtion' => $request->describtion,
                'image' => $request->image,
                'created_by' => (Auth::user()->name),
                'category_id' => $request->category_id
        ]);

        session()->flash('Add' , 'SubCategory Added Success');
        return redirect('/sub_category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category_id = Category::where('name' , $request->category_name )->first()->id;
        $validated = $request->validate([
            'name' => 'required|max:255|unique:sub_categories,name,'.$request->id,
            'describtion' => 'required|max:255',
            'image' => 'required|max:255',
            'status' =>'in:0,1'
        ]);

        $sub_category = SubCategory::find($request->id);
        $sub_category->update([
            'name' => $request->name,
            'describtion' => $request->describtion,
            'image' => $request->image,
            'status' => $request->status,
            'category_id' => $category_id,

        ]);

        session()->flash('Edit' , 'Update Category Success');
        return redirect('/sub_category');
    }

   
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        SubCategory::find($request->id)->delete();

        session()->flash('Delete' , 'SubCategory Deleted Success');
        return redirect('/sub_category');
    }
}
