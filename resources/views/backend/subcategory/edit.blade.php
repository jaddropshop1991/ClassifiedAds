@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    @include('backend.inc.message')

                    <h4>Update Subcategory</h4>
                    <div class="card">

                        <div class="card-body">

                        <form class="forms-sample" action="{{route('subcategory.update',[$subcategory->id])}}" method="post" enctype="multipart/form-data">@csrf
                            @method('PUT')    
                            <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value={{ $subcategory->name }}>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="name">Choose category</label>
                                  <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                                    <option value="">Select category</option>
                                    @foreach (App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" {{ $subcategory->category_id==$category->id ? 'selected' :''}}>{{ $category->name }}</option>

                                    @endforeach  
                                </select>
                                  @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
