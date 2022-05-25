<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;

class ApiCategoryController extends Controller
{
    //
    public function getCategory(){
        $category = Category::get();
        return response()->json($category);
    }

    public function getSubcategory(Request $request){
        $subcategory = Subcategory::where('category_id',$request->category_id)->get();
        return response()->json($subcategory);
    }

    // public function getSubcategory(){
    //     $subcategory = Subcategory::get();
    //     return response()->json($subcategory);
    // }

    // public function getChildcategory(){
    //     $childcategory = Childcategory::where('subcategory_id',7)->get();
    //     return response()->json($childcategory);
    // }
    public function getChildcategory(Request $request){
        $childcategory = Childcategory::where('subcategory_id',$request->subcategory_id)->get();
        return response()->json($childcategory);
    }

    // public function getChildcategory(){
    //     $childcategory = Childcategory::get();
    //     return response()->json($childcategory);
    // }

}
