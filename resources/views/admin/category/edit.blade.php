@extends('layouts.backend.app')

@section('title', 'edit')

@push('css')
<style>
    
 </style> 
@endpush



@section('content')


    
<div class="container">
    <h2 class="text-center" style="font-weight: 600;"> Edit Category</h2>
<br>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 card p-4">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input  name="name" placeholder="type here.." value="{{ old('name', $category->name) }}" class="form-control">
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
                <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Back</a>
            </form>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

@endsection