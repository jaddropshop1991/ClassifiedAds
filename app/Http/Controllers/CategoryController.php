<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display record in page
        // dd('dispaly records');
        $categories = Category::get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show form
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        //store record
        // dd($request->all());
        $image = $request->file('image')->store('public/category');
      
        Category::create([
            'name'=>$name = $request->name,
            'image'=>$image,
            'slug'=>Str::slug($name)
        ]);
        return redirect()->route('category.index')->with('message','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show individual record
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit record
        $category =Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        //update record
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/category');
            $category->update(['name'=>$request->name, 'image'=>$image]);
        } else {
        Storage::delete($category->image);

        $image= $category->image = "";
        }
        $category->update(['name'=>$request->name]);
        return redirect()->route('category.index')->with('message','Category updated successfully');
        // return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete record
        $category = Category::find($id);
        if(Storage::delete($category->image)){
            $category->delete();
        }
        // return back();
        return redirect()->route('category.index')->with('message','Category deleted successfully');
    }
}
