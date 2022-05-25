@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            @include('backend.inc.message')

            <h4>Manage Category</h4>
            <div class="row justify-content-center">


                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            
                                        
                                        <tr>
                                            <td><img class="image-category" src="{{ Storage::url($category->image) }}" alt=""></td>
                                            <td>{{ $category->name }}</td>
                                            <td> <a href="{{ route('category.edit', [$category->id]) }}">
                                            <button class="btn btn-info"><i class="mdi mdi-table-edit"></i></button></a></td>
                                            <td>



<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $category->id }}">
    Delete <i class="mdi mdi-delete"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form action="{{ route('category.destroy', $category->id) }}" method="post">@csrf
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
                                            
                                        <td>No Category to Display</td>
                                        @endforelse
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <style>
                .image-category{
                    height: 100px !important;
                    width: 110px !important;
                    border-radius: 5% !important;
                    image-rendering: auto !important;
  image-rendering: crisp-edges !important;
  image-rendering: pixelated !important;
  
                }
            </style>
            @endsection
