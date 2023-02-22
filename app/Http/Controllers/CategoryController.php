<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.category' , compact('categories'));
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

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'describtion' => 'required|max:255',
            'image' => 'required|max:255',
        ]);

            Category::create([
                'name' => $request->name,
                'describtion' => $request->describtion,
                'image' => $request->image,
                'created_by' => (Auth::user()->name)
            ]);
        
        session()->flash('Add' , 'Add Category Success');
        return redirect('/category');
        
        // return $request->category_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request)
    {
        $id = $request->id;
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,'.$id,
            'describtion' => 'required|max:255',
            'image' => 'required|max:255',
            'status' =>'in:0,1'
        ]);

        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'describtion' => $request->describtion,
            'image' => $request->image,
            'status' => $request->status,
        ]);

        session()->flash('Edit' , 'Update Category Success');
        return redirect('/category');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request)
    {
        // return $request;die;
        $id = $request->id;
        Category::find($id)->delete();
        session()->flash('Delete' , 'Deleted Category Success');
        return redirect('/category');

    }
}
