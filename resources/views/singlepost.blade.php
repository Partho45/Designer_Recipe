@extends('layouts.frontend.app')

@section('title','Single Post')
    
@push('css')
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <style>
        img{
            border-radius: 20px;
        }
    
        .cont{
            padding: 40px 20px;
            margin-top: 95px;
        }
        h2, h4{
            font-family: 'Lalezar', cursive;
        }
    
        p{
            text-align: justify;
        }
    </style>
@endpush

    
@section('content')

                    @if (session()->has('successSubscriber'))
                        <div class="alert alert-success m-3" role="alert">
                            {{ session()->get('successSubscriber') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

      
        <div class="container cont my-4">
            <div class="row gallery" style="margin-top: 130px;">
                @foreach (json_decode($recipe->images) as $picture)
                           <div class="col-md-3">
                               <a href="{{ asset('images/'.$picture) }}">
                                           <img  src="{{ asset('images/'.$picture) }}" class="img-fluid m-2" style="height: 150px;width: 100%; ">
                               </a>
                           </div>
                @endforeach
           </div>


            <div class="row my-4 mx-3">
                <h2>{{ $recipe->title }}</h2>
            </div>
            <hr>
            <div class="row mx-3">
                <h4>Design Description</h4>
            </div>
            <div class="row my-4 mx-3">
                <p>{{ $recipe->body }}</p>
            </div>


            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=383065439503444&autoLogAppEvents=1"
                nonce="rsxOi2WL"></script>

            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div>


            <a href="{{ URL::previous() }}" class="btn btn-danger" > BACK</a>
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