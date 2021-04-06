<section id="nav-bar">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('assets/frontend/image/White Png.png') }}" alt="logo" class="img-fluid" height="75px" width="100px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="background-color:  #fff;"></span>
  </button>

   <div class="collapse navbar-collapse"></div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item a">
        <a class="nav-link" href="{{ route('home') }}">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('recipe.allRecipe') }}">All Designs</a>
      </li>
        

      @guest
       <li class="nav-item">
             <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      @endguest

      
        @auth
            @if (Auth::user()->role_id == 1)
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            @endif
            @if (Auth::user()->role_id == 2)
              <li class="nav-item"><a class="nav-link" href="{{ route('member.dashboard') }}">Dashboard</a></li>
            @endif
        @endauth
          
      

    </ul>
    @guest
    <form class="form-inline my-2 my-lg-0">
      <a href="{{ route('register') }}" class="btn btn-primary my-2 px-4 py-2 " ><b>Register For Membership</b></a>
    </form>
    @endguest
    
  </div>
</nav>
</section>