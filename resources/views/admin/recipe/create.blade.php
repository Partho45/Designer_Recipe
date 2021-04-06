@extends('layouts.backend.app')

@section('title', 'create recipe')

@push('css')
<style>
    
 </style> 
@endpush

@section('content')


<h2 style="text-align:center;font-weight: 700">Add New Design</h2>
<br>
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-12 card p-4 ">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.recipe.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Design Title</label>
                        <input  name="title" placeholder="type here.." value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Design Description</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="6">{{ old('body') }}</textarea>
                    </div>

                    
                    <div class="form-group">
                        <select name="categories" id="category" class="form-control">
                            <option class="text-center" value="" >Select a category</option>
                            @foreach ($categories as $category)
                                <option class="text-center" value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="featured_image">Featured Images</label>
                        <input type="file" name="featured_image" class="form-control" id="featured_image">
                    </div>

                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>


            
                   
                    <button type="submit" class="btn btn-success">Create</button>
                    <a href="{{ route('admin.recipe.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
            
        </div>
    </div>

@endsection


@section('js')
  
@endsection