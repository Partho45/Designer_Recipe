@extends('layouts.backend.app')

@section('title', 'single post')

@push('css')
<style>
    
 </style> 
@endpush

@section('content')

    <div class="container">
        <div class="row mx-3"> 
            <a href="{{ URL::previous() }}" class="btn btn-danger mr-2">Back</a>
            @if (Auth::id() == $recipe->user_id)
                    <a href="{{ route('admin.recipe.edit', $recipe->id) }}" class="btn btn-info">Edit</a>
            @endif
        </div>
    </div>



    {{-- <section class="gallery-block cards-gallery m-0 p-0" id="gallery">
        <div class="container">
            <div class="row ">
                @foreach (json_decode($recipe->images) as $picture)
                    <div class="col-md-3">
                        <div class="card border-0 transform-on-hover text-center">
                        <a class="lightbox"  href="{{ asset('images/'.$picture) }}">
                            <img  src="{{ asset('images/'.$picture) }}" class="card-img-top img-fluid">
                        </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> 
    </section>   --}}






    <div class="container mt-4" >
                <div class="row gallery">
                     @foreach (json_decode($recipe->images) as $picture)
                                <div class="col-md-3">
                                    <a href="{{ asset('images/'.$picture) }}">
                                                <img  src="{{ asset('images/'.$picture) }}" class="img-fluid m-2" style="height: 150px;width: 100%; ">
                                    </a>
                                </div>
                     @endforeach
                </div>

        {{-- @foreach (json_decode($recipe->images) as $picture)
                <img  src="{{ asset('images/'.$picture) }}" style="height: 100px;width: 150px" class="m-3">
            @endforeach
         --}}


        <div class="row mt-5" >
            <h6> Design Name: <strong>{{ $recipe->title }}</strong></h6>
        </div>
        <div class="row">
            <h6>Category: <strong>{{ $recipe->category->name }}</strong></h6>
        </div>
        <div class="row" style="margin-top: 25px;">
            <h6> <strong> Design Description: </strong></h6> 
        </div>
        <div class="row" style="margin-top: 5px;text-align: justify; width:90%">
            <p>{{ $recipe->body }}</p>
        </div>
    </div>

@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
<script>
   window.addEventListener('load', function() {
        baguetteBox.run('.gallery', {
            animation: 'fadeIn',
            noScrollbars: true
        });
   });
</script>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
@endsection