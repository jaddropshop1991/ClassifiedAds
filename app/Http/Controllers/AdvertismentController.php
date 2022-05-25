<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Advertisment;
use Illuminate\Support\Str;
use App\Http\Requests\AdsFormrequest;
use App\Http\Requests\AdsFormUpdateRequest;
class AdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        //
        $ads = Advertisment::latest()->where('user_id',auth()->user()->id)->get();
        return view('ads.index', compact('ads'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $menus = Category::with('subcategories')->get();

        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsFormrequest $request)
    {
        //
        // dd($request->all());
       $data = $request->all();
        $featuredImage = $request->file('featured_image')->store('public/ads');
        $firstImage = $request->file('first_image')->store('public/ads');
        $secondImage = $request->file('second_image')->store('public/ads');
        $data['featured_image'] = $featuredImage;
        $data['first_image'] = $firstImage;
        $data['second_image'] = $secondImage;
        $data['slug'] = Str::slug($request->name);
        $data['user_id']=auth()->user()->id;

        Advertisment::create($data);
        // return "created";
        return redirect()->route('ads.index')->with('message','your ad was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

       
        $ad = Advertisment::find($id);
        //check if user is the same as logged  user 
        //  if(auth()->user()===$ad->user_id){
            $this->authorize('edit-ad', $ad);
        return view('ads.edit', compact('ad'));
        //  }else{
        //      abort(404);
        //  }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsFormUpdateRequest $request, $id)
    {
        //
        $ad = Advertisment::find($id);
        
        $featuredImage = $ad->featured_image;
        $firstImage = $ad->first_image;
        $secondImage = $ad->second_image;
        $data = $request->all();
        if($request->hasFile('featured_image')){
            $featuredImage = $request->file('featured_image')->store('public/ads');
        }
        if($request->hasFile('first_image')){
            $firstImage = $request->file('first_image')->store('public/ads');

        }
        if($request->hasFile('second_image')){
            $secondImage = $request->file('second_image')->store('public/ads');

        }
        $data['featured_image'] = $featuredImage;
        $data['first_image'] = $firstImage;
        $data['second_image'] = $secondImage;

        $ad->update($data);
        return redirect()->route('ads.index')->with('message','your ad was updated');

        // dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ad = Advertisment::find($id);
        $ad->delete();
        return back()->with('message', 'Ad deleted successfully');
    }


    public function pendingAds(){
        $ads = Advertisment::where('user_id',auth()->user()->id)
        ->where('published', 0)->get();
        return view('ads.pending', compact('ads'));
    }
}
