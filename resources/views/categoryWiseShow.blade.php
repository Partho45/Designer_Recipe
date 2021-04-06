@extends('layouts.frontend.app')

@section('title','Recipes')
  
@push('css')
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
@endpush


@section('content')

                         
<section id="recipe">
    <div class="container cont text-center" style="margin-top: 30px;">
     <h1 class="upper-title text-center">Category: <span class="category-name">{{ $category->name }}</span></h1>
        <div class="row">
         
           @forelse ($recipes as $item)
           <div class="col-md-4 float-left" >
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title title text-center">{{ str_limit($item->title, 40) }}</h4>
                    <p class="card-title">View: {{ $item->view_count }}</p>
                    <p class="card-text text-center pera">For Description</p>
                    <a href="{{ route('recipe.details', $item->slug) }}" class="button"  style="color: white;text-decoration: none; font-weight: bold;background: black;
                    padding:12px; ">Read More</a>
                </div>
                <img  src="{{ asset('storage/featured/'. $item->featured_image) }}" class="img-fluid" alt="Card image" style="padding: 0px 25px 25px 25px;height: 250px;">
            </div>
           
          </div>
           @empty
               <h1 class="m-auto">No Design Found</h1>
           @endforelse
        </div>
        <div style="display:flex; justify-content:center;align-items:center;">
            {{ $recipes->links() }}
        </div> 
        <br>
        <a class="btn btn-danger" href="{{  url('/') }}">Back To Home </a>
       
    </div>
</section>
      



@endsection

@push('js')



@endpush