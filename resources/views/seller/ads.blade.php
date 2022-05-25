{{-- 
@extends('layouts.app')
@section('content')

<div class="conatiner">
    <div class="row justify-content-center">
        <div class="col-md-4 ">

            <div class="card">
               
                <div class="card-body">
                @if ($user->avatar)
                   <img src="{{ Storage:: }}" alt=""> 
                @else
                <img src="/img/man.jpg" width="120" class="img-thumbnail" alt="">
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-8 ">

        <div class="card">
            <div class="row">
            <div class="card-body">
                @forelse ($advertisments as $advertisment)
                <div class="col-md-3">
                  <a href="{{ route('product.view',[$advertisment->id, $advertisment->slug]) }}">
          <img class="img-thumbnail" style="min-height:170px" src="{{ Storage::url($advertisment->featured_image) }}" alt="First slide">
      <p class="text-center card-footer" style="color:#222">
      {{ $advertisment->name }}/$ {{ $advertisment->price }}
      </p>
      </div></a>
      @empty
               <p>No ads found</p> 
              @endforelse
            </div>
        </div>
        </div>
        {{ $advertisments->links()}}
    </div>
    </div>
</div>

@endsection --}}

@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card">

                    <div class="card-body">
                        @if ($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" width="120" class="mx-auto d-block">
                        @else
                            <img src="/img/man.jpg" width="120" class="mx-auto d-block">
                        @endif
                        <p class="text-center">{{ $user->name }}</p>
                    </div>

                </div>
            </div>

            <div class="col-md-8">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            @forelse($advertisments as $advertisment)
                                <div class="col-md-4">
                                    <a href="{{ route('product.view', [$advertisment->id, $advertisment->slug]) }}">
                                        <img src="{{ Storage::url($advertisment->featured_image) }}" class="img-thumbnail"
                                            style="">

                                        <p class="text-center card-footer" style="color: royalblue;">
                                            {{ $advertisment->name }}/USD {{ $advertisment->price }}
                                        </p>
                                    </a>
                                </div>
                            @empty
                                <p>No any ads</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                {{ $advertisments->links() }}
            </div>
        </div>
    </div>

@endsection
