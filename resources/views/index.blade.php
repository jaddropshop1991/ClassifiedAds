
@extends('layouts.app')
@section('content')

<div class="slider" style="margin-top:-25px">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/slider/slider1.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/slider/slider2.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/slider/slider3.png" alt="Third slide">
      </div>
    </div>
  </div>
</div>


{{-- <div>
  <user-component></user-component>
</div> --}}

{{-- <div>
  <featured-image></featured-image>
</div> --}}

{{-- <category-dropdown></category-dropdown> --}}


<div class="container mt-5">
  <h1>Top category</h1>
  <div class="row text-center mt-5">
    @foreach($categs as $categ)
    <div class="col-lg-3 col-md-4 col-lg" id="card">
      <a href="{{ route('category.show', $categ->slug) }}" class="d-block mb-4 h-100">
    {{--  <img src="{{ Storage::url($categ->image) }}" style="width:50%" class="img-fluid img-thumbnail" alt=""> --}}
      
      <img src="{{ $categ->image }}" style="width:50%" class="img-fluid img-thumbnail" alt="">
      
    <p class="">{{ $categ->name }}</p>
    </a>
      </div>      
    @endforeach
  </div>
</div>





<div class="container mt-5">
    <span>
        <h1>{{ $category->name }}</h1>
        <a href="{{ route('category.show', $category->slug) }}" class="float-right">View all</a>
    </span>
    <br>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
    <div class="carousel-inner">
      <div class="carousel-item active">
     
        <div class="row">
          @forelse ($firstAds as $firstAd)
          <div class="col-3">
            <a href="{{ route('product.view',[$firstAd->id, $firstAd->slug]) }}"><img class="img-thumbnail" style="min-height:170px" src="{{ Storage::url($firstAd->featured_image) }}" alt="First slide">
            </a>
        <p class="text-center card-footer" style="color:#222">
           {{ $firstAd->name }}/$ {{ $firstAd->price }}
       </p>
        </div>
          @empty
            
          @endforelse

  </div>


    </div>

    <div class="carousel-item">
        <div class="row">
          @forelse ($secondAds as $secondAd)
            <div class="col-3">
              <a href="{{ route('product.view',[$secondAd->id, $secondAd->slug]) }}">
      <img class="img-thumbnail" style="min-height:170px" src="{{ Storage::url($secondAd->featured_image) }}" alt="First slide">
 <p class="text-center card-footer" style="color:#222">
  {{ $secondAd->name }}/$ {{ $secondAd->price }}
 </p>
  </div></a>
  @empty
            
          @endforelse

  </div>
</div>


    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>






<div class="container mt-5">
  <span>
      <h1>{{ $category2->name }}</h1>
      <a href="{{ route('category.show', $category2->slug) }}" class="float-right">View all</a>
  </span>
  <br>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
  <div class="carousel-inner">
    <div class="carousel-item active">
   
      <div class="row">
        @forelse ($firstAdsCat2 as $firstAdCat2)
        <div class="col-3">
          <a href="{{ route('product.view',[$firstAdCat2->id, $firstAdCat2->slug]) }}"><img class="img-thumbnail" style="min-height:170px" src="{{ Storage::url($firstAdCat2->featured_image) }}" alt="First slide">
          </a>
      <p class="text-center card-footer" style="color:#222">
         {{ $firstAdCat2->name }}/$ {{ $firstAdCat2->price }}
     </p>
      </div>
        @empty
          
        @endforelse

</div>


  </div>

  <div class="carousel-item">
      <div class="row">
        @forelse ($secondAdsCat2 as $secondAdCat2)
          <div class="col-3">
            <a href="{{ route('product.view',[$secondAdCat2->id, $secondAdCat2->slug]) }}">
    <img class="img-thumbnail" style="min-height:170px" src="{{ Storage::url($secondAdCat2->featured_image) }}" alt="First slide">
<p class="text-center card-footer" style="color:#222">
{{ $secondAdCat2->name }}/$ {{ $secondAdCat2->price }}
</p>
</div></a>
@empty
          
        @endforelse

</div>
</div>


  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>



@endsection

<style>
  #card a:hover{
    background-color: #ccc;
    color: #fff;
  }
</style>
