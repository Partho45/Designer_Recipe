@extends('layouts.backend.app')

@section('title', 'Edit')

@push('css')
<style>
    
 </style> 
@endpush

@section('content')


<h2 style="text-align:center;font-weight: 700">Edit Design</h2>
<br>
    
    

    <div class="container">
        <div class="row justify-content-center">
         
            <div class="col-md-12 card p-4">
                <form action="{{ route('member.recipe.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Design Title</label>
                        <input  name="title" placeholder="type here.." value="{{ old('title', $recipe->title) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Design Description</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="3">{{ old('body', $recipe->body) }}</textarea>
                    </div>
                   

                    <div class="form-group">
                        <select name="categories" id="category" class="form-control">
                            <option class="text-center" value="" >Select a category</option>
                            @foreach ($categories as $category)
                                <option class="text-center" {{ $recipe->category_id == $category->id ? 'selected' : '' }} 
                                 value="{{ $category->id }}" >{{ $category->name }}</option>
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
            
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('member.recipe.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

@endsection