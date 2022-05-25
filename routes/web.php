<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/test', function () {
    return view('test');
});

Route::get('/reg', function () {
    return view('auth.register');
});

Route::get('/log', function () {
    return view('auth.login');
});


Route::get('/home', function(){
    return view('test');
});





// auth adminArea using admin middleware defined in the middleware and kernel
Route::group(['prefix'=>'auth','middleware'=>'admin'], function(){
    Route::get('/', function(){
        return view('backend.admin.index');
    });
    
    // Route::get('/category/create', 'CategoryController@create');
    // Route::get('/category', 'CategoryController@index');
    // Route::get('/category/store', 'CategoryController@store');
    Route::resource('/category', 'CategoryController');
    Route::resource('/subcategory', 'SubcategoryController');
    Route::resource('/childcategory', 'ChildcategoryController');
    
    //admin listing
    Route::get('/allads', 'AdminListingController@index')->name('all.ads');

    //listing reported ad
    Route::get('/reported-ads', 'FraudController@index')->name('all.reported.ads');

});
// Route::get('/auth/category', function(){
//     return view('backend.category.create');
// });

Route::get('/', 'MenuController@menu');

Route::get('/forget-password', function(){
    return view('auth.forget-password');
});

Route::get('dashboard', 'DashboardController@index');


//ads
Route::get('/ads/create', 'AdvertismentController@create')->name('ads.create')->middleware('auth');
Route::post('/ads/store','AdvertismentController@store')->middleware('auth')->name('ads.store');
Route::get('/ads','AdvertismentController@index')->middleware('auth')->name('ads.index');
Route::get('/ads/{id}/edit','AdvertismentController@edit')->name('ads.edit')->middleware('auth');
Route::Put('/ads/{id}/update','AdvertismentController@update')->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete','AdvertismentController@destroy')->name('ads.destroy')->middleware('auth');

// Route::get('/dashboard','DashboardController@index');

//get pending ads
Route::get('/ad-pending','AdvertismentController@pendingAds')->name('pending.ad');


//category api
Route::get('/api/category/', 'Api\ApiCategoryController@getCategory');
Route::get('/api/subcategory/', 'Api\ApiCategoryController@getSubcategory');
Route::get('/api/childcategory/', 'Api\ApiCategoryController@getChildcategory');


// country api
Route::get('/api/country/', 'Api\AddressController@getCountry');
Route::get('/api/state/', 'Api\AddressController@getState');
Route::get('/api/city/', 'Api\AddressController@getCity');



//profile 
Route::get('/profile', 'ProfileController@index')->name('profile')->middleware('auth');
Route::post('/profile', 'ProfileController@updateProfile')->name('update.profile')->middleware('auth');


//frontend 
Route::get('/product/{categorySlug}','FrontendController@findBasedOnCategory')->name('category.show');
Route::get('/product/{categorySlug}/{subcategorySlug}','FrontendController@findBasedOnSubcategory')->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childCategorySlug}',
'FrontendController@findBasedOnChildcategory')->name('childcategory.show');

//single product
Route::get('/products/{id}/{slug}','FrontendController@show')->name('product.view');
// Route::post('/register', 'RegisteredUserController@create')->name('register');


// Route::post('/start-conversation', 'SendMessageController@startConversation');
// Route::post('/send/message','SendMessageController@store')->middleware('auth');

//Message
Route::post('/send/message','SendMessageController@store')->middleware('auth');
Route::get('messages','SendMessageController@index')->name('messages')->middleware('auth');
Route::get('/users','SendMessageController@chatWithThisUser');
Route::get('/message/user/{id}','SendMessageController@showMessages');
Route::post('/start-conversation','SendMessageController@startConversation');

//show all user ads
Route::get('/ads/{userId}/view','FrontendController@viewuserAds')->name('show.user.ads');


//login with facebook
Route::get('auth/facebook', 'SocialLoginController@facebookRedirect');
Route::get('auth/facebook/callback', 'SocialLoginController@LoginWithFacebook');

//save favorite ad
Route::post('/ad/save','SaveAdController@saveAd');
//get all saved ads
Route::get('/saved-ads','SaveAdController@getMyAds')->name('saved.ad');

Route::post('/ad/remove','SaveAdController@removeAd')->name('ad.remove');


//report ad
Route::post('/report-this-ad', 'FraudController@store')->name('report.ad');
