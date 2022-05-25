<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Cohensive\Embed\Facades\Embed;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class Advertisment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function childcategory(){
        return $this->hasOne(childcategory::class, 'id','childcategory_id');
    }
//     protected $fillable = ['featured_image', 'first_image', 'second_image', 'slug', 'user_id','category_id',
// 'subcategory_id','childcategory_id','name','description','price','price_status','product_condition','listing_location','country_id','state_id','city_id','phone_number','published','link'
// ];

    public function country(){
        return $this->belongsTo(country::class);
    }

    public function state(){
        return $this->belongsTo(state::class);
    }


    public function city(){
        return $this->belongsTo(city::class);
    }


    public function user(){
        return $this->belongsTo(user::class);
    }


     //display embeded videos with KaneCohen/embed github repo
     public function displayVideoFromLink(){
         $embed = Embed::make($this->link)->parseUrl();
         if(!$embed){
             return;
         }
         $embed->setAttribute(['width' => 500]);
         return $embed->getHtml();
     }


     //scope method for food
     public function scopeFirstFourAdsInCaurosel($query, $categoryId){
         return $query->where('category_id', $categoryId)
         ->orderByDesc('id')->take(4)->get();
     }

     public function scopeSecondFourAdsInCaurosel($query, $categoryId){
         $firstAds = $this->scopeFirstFourAdsInCaurosel($query, $categoryId);
         return $query->where('category_id', $categoryId)
         ->whereNotIn('id', $firstAds->pluck('id')->toArray())
         ->take(4)->get();
     }

     //scope method for category drinks
       //scope method for food
       public function scopeFirstFourAdsInCauroselForDrinks($query, $categoryId){
        return $query->where('category_id', $categoryId)
        ->orderByDesc('id')->take(4)->get();
    }

    public function scopeSecondFourAdsInCauroselForDrinks($query, $categoryId){
        $firstAds = $this->scopeFirstFourAdsInCaurosel($query, $categoryId);
        return $query->where('category_id', $categoryId)
        ->whereNotIn('id', $firstAds->pluck('id')->toArray())
        ->take(4)->get();
    }


    //each user has many saved ads and each ad can be saved by multiple users
    //save ads relationship
    public function userads(){
        return $this->belongsToMany(User::class);
    }


    //check if user already saved the ad
    public function didUserSavedAd(){
        return DB::table('advertisment_user')
        ->where('user_id', auth()->user()->id)
        ->where('advertisment_id', $this->id)
        ->first();
    }
}
