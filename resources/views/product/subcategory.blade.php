@extends('layouts.app')
@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: red;">Filter</div>
                    <div class="card-body">
                        @foreach ($filterByChildCategories as $filterchildcategory)
                        <p>
                            
                        <a href="{{url()->current()}}/{{($filterchildcategory->childcategory->slug)??''}}">
                             {{ $filterchildcategory->childcategory->name??'' }} </a>  
                        </p> 
                        @endforeach
                        
                       
                        

                    </div>

                </div>

                <br>
                <form action="{{ url()->current() }}" method="">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Minimum price</label>
                                <input type="text" name="minPrice" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Maximum price</label>
                                <input type="text" name="maxPrice" class="form-control">
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-danger">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-md-9">

{{-- 
                <div>
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i>
                      <a href="/">Home</a>
                  </li>
                      @for($i=2; $i<=count(Request::segments());$i++)
                      @if($i<count(Request::segments()) & $i>0)
                          <a href="{{ URL::to(implode('/',array_slice(Request::segments(),0,$i,true))) }}">{{ ucwords(Request::segment($i)) }}</a>
                       
                      @else
                        {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                      @endif 
                      @endfor
                    </ol>
                  </div> --}}
                  @include('breadcrumb')



                <div class="row">
                   @forelse($advertisments as $advertisment)
                   <div class="col-3">
                       <a href="{{ route('product.view',[$advertisment->id, $advertisment->slug]) }}">
                    <img src="{{ Storage::url($advertisment->featured_image) }}" width="130" alt="First slide">
                    <p class="img-thumbnail" style="color:rgb(17, 12, 125)">
                       {{ $advertisment->name }}/ USD{{ $advertisment->price }}
                    </p>
                </div></a>
                   @empty
                       Sorry, we are unable to find ads based on this category
                   @endforelse
                        
                       
                       

                 
                </div>
            </div>
        </div>
    </div>

@endsection
