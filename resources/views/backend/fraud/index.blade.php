@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            @include('backend.inc.message')

            <h4>Reported Advertisments</h4>
            <div class="row justify-content-center">


                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    
                                    <thead>
                                        <tr>
                                            <th>Name of ad</th>
                                           
                                            <th>Email</th>
                                            <th>Reason</th>
                                            <th>Message</th>
                                            <th>View</th>
                                            {{-- <th>Edit</th> --}}
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ads as $ad)
                                            
                                        
                                        <tr>
                                            
                                            {{-- <td>
                                                @if ($ad->user->avatar)
                                                    <img src="{{ Storage::url($ad->user->avatar) }}" width="120" alt="">
                                                @else
                                                <img src="/img/man.jpg" width="120" alt="">
                                                    @endif
                                                    <a target="_blank" href="{{ route('show.user.ads',$ad->user->id) }}">{{ $ad->user->name }}</a>
                                            </td> --}}

                                            

                                            {{-- <td><img class="image-ad" src="{{ Storage::url($ad->ad->featured_image) }}" alt=""></td> --}}
                                            <td>{{ $ad->fraudad->name }}</td>
                                            <td>{{ $ad->email }}</td>
                                            <td>{{ $ad->reason }}</td>
                                            <td>{{ $ad->message }}</td>
                                            {{-- <td>{{ $ad->created_at->format('Y-m-d') }}</td> --}}

                                            {{-- <td><a href="{{ route('product.view', [$ad->id, $ad->slug]) }}" target="_blank" > --}}
                                                <td>
                                                    <a target="_bliank" href="{{ route('product.view', [$ad->ad_id,$ad->fraudad->slug]) }}">
                                                <button class="btn btn-primary" >
                                                    View
                                                   </button></a>
                                                    </a></td>
                                            {{-- <td> <a href="{{ route('category.edit', [$ad->id]) }}">
                                            <button class="btn btn-info"><i class="mdi mdi-table-edit"></i></button></a></td> --}}
                                            
                                            <td>



    {{-- <a target="_blank" href="{{ route('product.view', [$ad->id, $ad->slug]) }}">
<button class="btn bnt-info">
    View
</button>
    </a> --}}

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $ad->ad_id }}">
   <i class="mdi mdi-delete"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $ad->ad_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form action="{{ route('ads.destroy', $ad->ad_id) }}" method="post">@csrf
            @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Once deleted can nver be recoverd
            {{-- <button class="btn btn-danger"><i class="mdi mdi-delete"></i></button> --}}
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </form>
    </div>
  </div>

</td>


                                              
                                            </tr>
                                        @empty
                                            
                                        <td>No Reported Ads to Display</td>
                                        @endforelse
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                {{ $ads->links() }}
            </div>

            <style>
                .image-ad{
                    height: 100px !important;
                    width: 110px !important;
                    border-radius: 5% !important;
                    image-rendering: auto !important;
  image-rendering: crisp-edges !important;
  image-rendering: pixelated !important;
  
                }
            </style>
            @endsection
