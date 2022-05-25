<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Models\Fraud;

class FraudController extends Controller
{
    //

    public function store(Request $request){
        // dd($request->all());
        Fraud::create([
            'reason'=>$request->reason,
            'email'=>$request->email,
            'message'=>$request->message,
            'ad_id'=>$request->ad_id
        ]);
        return back()->with('message','Your report has been recorded, Thank you for your feedback');
    }

    //for admin section
    public function index(){
        $ads = Fraud::paginate(6);
        return view('backend.fraud.index' , compact('ads'));
    }
}
