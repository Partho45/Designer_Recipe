@extends('layouts.frontend.app')

@section('title','Home Page')
    

@push('css')
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
@endpush

<style>
  
  

</style>
    
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

       <section id="cover"> 
        <div class="container-fluid">
            <div class="row">
                
            </div>
        </div>
       </section>


       


       <section id="recipe">
           <div class="container text-center">
            <h1 class="upper-title text-center">See Our Latest Designs</h1>
               <div class="row">
                <div class="col-sm-8 col-md-9 mb-3">
                @forelse ($recipes as $item)
                  <div class="col-sm-12  col-md-6 col-lg-6 mb-4  full-recipe">
                    <div class="card recipe">
                        <div class="card-body text-center">
                            <h4 class="card-title title text-center">{{ str_limit($item->title, 40) }}</h4>
                            <p class="card-title">View: {{ $item->view_count }}</p>
                            <p class="card-text text-center pera">For Description</p>
                            <a href="{{ route('recipe.details', $item->slug) }}" class="button"  style="color: white;text-decoration: none; font-weight: bold;background: black;
                            padding:12px; ">View More</a>
                        </div>
                        <img  src="{{ asset('storage/featured/'. $item->featured_image) }}" class="img-fluid" alt="Card image" style="padding: 0px 25px 25px 25px; height: 250px;">
                    </div>
                   
                  </div>
                  @empty  
                        <h3 class="bg-dark text-white p-3 m-3">No Design Found</h3>
                  @endforelse
                </div>
                <div class="col-sm-4 col-md-3 ">
                    <div class="list-group">
                        <button type="button" class="list-group-item  list-group-item-style bg-dark">
                          All Categories
                        </button>
                        @foreach ($categories as $category)
                        <button type="button" class="list-group-item list-group-item-success">
                            <a style="text-decoration: none" href="{{ route('categoryWiseShow.recipe.details', $category->id ) }}"><strong>{{ $category->name }} </strong>
                            <span class="badge badge-dark">{{ $category->recipes->count() }}</span></a>
                             </button>
                        @endforeach
                      </div>
                </div>
                @if ($recipes->count() > 0)
                     <a href="{{ route('recipe.allRecipe') }}" class="btn btn-default m-auto see-more">See More</a>
                @endif
               </div>
           </div>
       </section>


       



       <div class="container-fluid" id="subscribe">
           <div class="row my-5">
               <h1 class="m-auto">Subscribe Our Website For Quick Update</h1>
           </div>
           <div class="row my-2 justify-content-center">
                @if (session()->has('successSubscriber'))
                    <div class="alert alert-success m-3 text-center" id="success" role="alert">
                    {{ session()->get('successSubscriber') }}
                    </div>
                @endif 

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
           </div>
           <div class="row justify-content-center">
                    
            
                    <form action="{{ route('subscriber.store') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-start col-md-12">
                             <div class="form-group">
                                 <input type="email" name="email" placeholder="enter email" class="form-control">
                             </div>
                             <div class="form-group">
                                 <button type="submit" class="btn btn-danger ml-2">Subscribe</button>
                             </div>
                        </div>
                        
                    </form>
           </div>
       </div>


       <section id="search" class="search py-5">
            <div class="container text-center">
            <h2>You can search design</h2>
            <div class="row text-center" >
                <br>
                <div class="form-inline m-auto">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <input type="text" name="query" placeholder="Enter Design Name" size="40px" class="px-4 py-2 form-control">
                        <input type="submit" value="Search" class="btn btn-danger px-4 py-2 ml-1">
                    </form>
                </div>
            </div>
            
            </div>
        </section>


        <section id="meet">
            <div class="container-flid">
                <div class="row justify-content-center">
                    <h1><strong>Meet Our Team</strong></h1>
                </div>
                <div class="row justify-content-center">
                    <p class="head">Meet Our Experianced Team</p>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/frontend/image/Partho.jpg') }}" alt="img" class="img-fluid">
                        <p class="my-4"><h2 class="name">Partho Ghosh</h2></p>
                        <p><small>Website Founder</small></p>
                        <p class="mb-3 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <p>Email: parthoghosh960@gmail.com 
                            <br>
                            Contact: +8801761039591
                        </p>
                       
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('assets/frontend/image/Fahim.JPG') }}" alt="img" class="img-fluid">
                        <p class="my-4"><h2 class="name">Shah Fahim Ahmed</h2></p>
                        <p><small>Website Founder</small></p>
                        <p class="mb-3 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <p>Email: fahim.sh1996@gmail.com
                            <br>
                            Contact: +8801751842290
                        </p>
                    </div> <div class="col-md-4">
                        <img src="{{ asset('assets/frontend/image/Nayeem.jpg') }}" alt="img" class="img-fluid">
                        <p class="my-4"><h2 class="name">Nayeem Azraf Chy</h2></p>
                        <p><small>Website Founder</small></p>
                        <p class="mb-3 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <p>Email: nayeem@metrouni.edu.bd 
                            <br>
                            Contact: +8801724932306
                        </p>
                    </div>
                </div>
            </div>
        </section>


  
                




@endsection

@push('js')



@endpush