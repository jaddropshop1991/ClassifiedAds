<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaveAdController extends Controller
{
    //
    public function saveAd(Request $request){

        
        $ad = Advertisment::find($request->adId);
        $ad->userads()->syncWithOutDetaching($request->userId);
        
        // DB::create([
        //     'user_id'=>$request->user_id,
        //     'advertisment_id'=>$request->ad_id
        // ]);
    }

    public function getMyAds(){
      
        // $advertisment = DB::table('advertisment_user')
        // ->where('user_id',auth()->user()->id)->get();
        
        $advertismentId = DB::table('advertisment_user')
        ->where('user_id',auth()->user()->id)->pluck('advertisment_id');
        $ads = Advertisment::whereIn('id',$advertismentId)->get();
        return view('seller.saved-ads', compact('ads'));
    }

    public function removeAd(Request $request){
        DB::table('advertisment_user')->where('user_id', auth()->id())
        ->where('advertisment_id', $request->adId)->delete();
        return back()->with('message','Ad removed from the saved list');
    }
}
