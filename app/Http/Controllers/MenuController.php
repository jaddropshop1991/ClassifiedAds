<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Models\Category;

class MenuController extends Controller
{
    //
    public function menu(){
        //category food
        $category = Category::where('name', 'food')->first();
        $firstAds = Advertisment::where('category_id', $category->id)
        ->orderByDesc('id')->take(4)->get();

        $secondAds = Advertisment::where('category_id', $category->id)
        ->whereNotIn('id',$firstAds->pluck('id')->toArray())
        ->take(4)->get();
        // $ads->pluck('id')->toArray();


        //category drinks
        $category2 = Category::where('name', 'drinks')->first();
        $firstAdsCat2 = Advertisment::where('category_id', $category2->id)
        ->orderByDesc('id')->take(4)->get();

        $secondAdsCat2 = Advertisment::where('category_id', $category2->id)
        ->whereNotIn('id',$firstAdsCat2->pluck('id')->toArray())
        ->take(4)->get();

        $categs = Category::get();
        // return $secondAds;
        return view('index',compact('categs','firstAds','secondAds','category','firstAdsCat2','secondAdsCat2','category2'));
        // $menus = Category::with('subcategories')->get();
        // return $menus;
        // return view('index', compact('menus'));
    }

}
