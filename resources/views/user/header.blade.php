<!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ url('redirect') }}"><h2>Simple <em>Store</em></h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('redirect') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ url('allproducts') }}">Products</a>
          </li>
          @if (Route::has('login'))
            @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('showcart') }}">
                    <div class="carticon d-inline">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart d-inline mr-2 mb-1" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                    </div>
                    Cart[{{ $count }}]
                  </a>
                </li>
                <li>
                  <div class="d-flex">
                    <form  action="{{ url('search') }}" method="get" class="form-inline mx-auto">
                      @csrf
                      <input class="form-control" type="search" name="search" placeholder="Type something..."></input>
                      <input class=" input-submit btn btn-outline-primary m-1 text-white" type="submit" value="Search"></input>
                    </form>
                  </div>
                </li>
                <li>
                  <x-app-layout>
                  </x-app-layout>
                </li>
          @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                </li>
                @if (Route::has('register'))
                  <li class="nav-item">
                      <a href="{{ route('register') }}" class="nav-link">Register</a>
                  </li>
                @endif
            @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
  @if(session()->has('message'))
    <div class="alert alert-success w-25 float-right mr-5">
        {{ session()-> get('message') }}
        <button type="button" class="close float-end" data-dismiss="alert">X</button>
    </div>
  @endif
</header>