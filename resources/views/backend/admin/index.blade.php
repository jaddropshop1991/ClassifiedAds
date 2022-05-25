@extends('backend.layouts.master')
@section('content')


<div class="main-panel">
    <div class="content-wrapper">
      
      <div class="row">
        <div class="col-md-3">
      <div class="card" style="background-color:blue;color:#fff">
      <div class="card-body text-center">
<i class="mdi mdi-account-multiple-outline" style="width: 130px"></i>
<p class="lead">Users</p>
<p class="lead">{{ App\Models\User::count() }}</p>
      </div>
    </div>
    </div>

    <div class="col-md-3">
      <div class="card" style="background-color:blue;color:#fff">
      <div class="card-body text-center">
<i class="mdi mdi-briefcase" style="width: 130px"></i>
<p class="lead">Advertisments</p>
<p class="lead">{{ App\Models\Advertisment::count() }}</p>
      </div>
    </div>
    </div>

    <div class="col-md-3">
      <div class="card" style="background-color:blue;color:#fff">
      <div class="card-body text-center">
<i class="mdi mdi-apps" style="width: 130px"></i>
<p class="lead">Categories</p>
<p class="lead">{{ App\Models\Category::count() }}</p>
      </div>
    </div>
    </div>

    <div class="col-md-3">
      <div class="card" style="background-color:blue;color:#fff">
      <div class="card-body text-center">
<i class="mdi mdi-dns" style="width: 130px"></i>
<p class="lead">Subcategories</p>
<p class="lead">{{ App\Models\Subcategory::count() }}</p>
      </div>
    </div>
    </div>

    <div class="col-md-3">
      <div class="card" style="background-color:blue;color:#fff">
      <div class="card-body text-center">
<i class="mdi mdi-disqus-outline" style="width: 130px"></i>
<p class="lead">Childcategories</p>
<p class="lead">{{ App\Models\Childcategory::count() }}</p>
      </div>
    </div>
    </div>
  </div>
</div>
          </div>
   
            {{-- <div class="d-flex align-items-end flex-wrap"> --}}

@endsection