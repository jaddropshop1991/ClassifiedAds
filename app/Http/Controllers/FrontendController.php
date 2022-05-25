<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisment;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\User;
class FrontendController extends Controller
{
    //

    public function findBasedOnCategory(Category $categorySlug){
        //get all ads based on category slug returned by the menu 
        $advertisments = $categorySlug->ads;
          //remove fetched subcategory duplicates based on category slug ads returned above 
        $filterBySubcategory = Subcategory::where('category_id',$categorySlug->id)->get();
        // return $filterBySubcategory;
        return view('product.category', compact('advertisments','filterBySubcategory'));
    }



    public function findBasedOnSubcategory(Request $request,$categorySlug,Subcategory $subcategorySlug){
        
        // dd($subcategorySlug->id);

       // filter based on min max price
        $advertismentBasedOnFilter = Advertisment::where('subcategory_id', $subcategorySlug->id)
        ->when($request->minPrice,function($query,$minPrice){
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function($query, $maxPrice){
            return $query->where('price', '<=', $maxPrice);
        })->get();

        // dd($subcategorySlug);

        //get all ads based on subcategory slug returned by the menu without applying price filtering method above
        $advertismentWithoutFilter =$subcategorySlug->ads;
        //to remove fetched childcategory duplicates based on subcategory slug ads returned above 
        $filterByChildCategories = $subcategorySlug->ads->unique('childcategory_id');
        
        $advertisments= $request->minPrice||$request->maxPrice?$advertismentBasedOnFilter:
        $advertismentWithoutFilter;
        
        return view('product.subcategory',compact('advertisments','filterByChildCategories'));

        // $sub = Subcategory::where('slug', $subcategorySlug)->first();
        // $subId = $sub->id;
        // $ads = Advertisment::where('subcategory_id',$subId)->get();
        // return view('product.subcategory', compact('ads'));

    }


    public function findBasedOnChildcategory(
        $categorySlug,
        Subcategory $subcategorySlug,
        Childcategory $childCategorySlug,
        Request $request
        ){


       $advertismentBasedOnFilter = Advertisment::where('childcategory_id', $childCategorySlug->id)
            ->when($request->minPrice,function($query,$minPrice){
                return $query->where('price', '>=', $minPrice);
            })->when($request->maxPrice, function($query, $maxPrice){
                return $query->where('price', '<=', $maxPrice);
            })->get();

        //get all ads based on childcategory slug returned by the menu without applying price filtering method above
        $advertismentWithoutFilter =$childCategorySlug->ads;
          //to remove fetched childcategory duplicates based on subcategory slug ads returned above 
        $filterByChildCategories = $subcategorySlug->ads->unique('childcategory_id');
        
        $advertisments= $request->minPrice||$request->maxPrice?$advertismentBasedOnFilter:
        $advertismentWithoutFilter;
        
        return view('product.childcategory',compact('advertisments','filterByChildCategories'));
    }



    //show single product
    public function show($id,$slug){
        $advertisment = Advertisment::where('id',$id)->where('slug',$slug)->first();
        return view('product.show', compact('advertisment')); 
    }


    //show all user ads
    public function viewuserAds($id){
        $advertisments = Advertisment::where('user_id',$id)->paginate(8);
        $user = User::find($id);
        return view('seller.ads',compact('advertisments','user'));
    }
}
