<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'slug'];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    

    //get category_id base on category slug
    public function getRouteKeyName(){
        return 'slug';
    }

    public function ads(){
        return $this->hasMany(Advertisment::class);
    }


    // public function scopeCategoryFood($query){
    //     return $query->where('name','food')->first;
    // }

    // public function scopeCategoryDrinks($query){
    //     return $query->where('name','drinks')->first;
    // }
}
