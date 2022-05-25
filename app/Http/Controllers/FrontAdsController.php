<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontAdsController extends Controller
{
    //
    public function index(){

         //get all categories
         

        // for category food
        $category = Category::categoryFood();
        $firstAds = Advertisment::firstFourAdsInCaurosel($category->id);
        $secondAds = Advertisment::FirstFourAdsInCaurosel($category->id);


       

        // for category drinks
        $categoryDrinks = Category::CategoryDrinks();
        $firstAdsForDrinks = Advertisment::FirstFourAdsInCauroselForDrinks($categoryDrinks->id);
        $secondAdsForDrinks = Advertisment::SecondFourAdsInCauroselForDrinks($categoryDrinks->id);
    return view('index',compact('firstAds', 'secondAds', 'category', 'categoryDrinks','firstAdsForDrinks','secondAdsForDrinks'));
    }
}
