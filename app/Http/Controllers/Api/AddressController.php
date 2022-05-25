<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

// class AddressController extends Controller
// {
//      //
//      public function getCountry(){
//         $country = Country::get();
//         return response()->json($country);
//     }

//     public function getState(Request $request){
//         $state = State::where('country_id',$request->country_id)->get();
//         return response()->json($state);
//     }

//     // public function getSubcategory(){
//     //     $subcategory = Subcategory::get();
//     //     return response()->json($subcategory);
//     // }

//     // public function getChildcategory(){
//     //     $childcategory = Childcategory::where('subcategory_id',7)->get();
//     //     return response()->json($childcategory);
//     // }
//     public function getCity(Request $request){
//         $city = City::where('state_id',$request->state_id)->get();
//         return response()->json($city);
//     }

//     // public function getChildcategory(){
//     //     $childcategory = Childcategory::get();
//     //     return response()->json($childcategory);
//     // }
// }
class AddressController extends Controller
{
    //
    public function getcountry(){
        $country = Country::get();
        return response()->json($country);
    }

    public function getstate(Request $request){
        $state = State::where('country_id',$request->country_id)->get();
        return response()->json($state);
    }

    // public function getstate(){
    //     $state = state::get();
    //     return response()->json($state);
    // }

    // public function getcity(){
    //     $city = city::where('state_id',7)->get();
    //     return response()->json($city);
    // }
    public function getcity(Request $request){
        $city = City::where('state_id',$request->state_id)->get();
        return response()->json($city);
    }

    // public function getcity(){
    //     $city = city::get();
    //     return response()->json($city);
    // }

}