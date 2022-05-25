<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisment;
class AdminListingController extends Controller
{
    //
    public function index(){
        $ads = Advertisment::latest()->paginate(8);
        return view('backend.listing.index', compact('ads'));
    }
}
