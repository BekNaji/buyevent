<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Demo Shop</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('') }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('') }}vendor/heroic-features.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Demo </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{request()->is('/')?'active':''}}">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            @auth
            @if(Auth::user()->role == 'admin')
            <li class="nav-item {{request()->is('product/*')?'active':''}}">
              <a class="nav-link" href="{{route('product.index')}}">Products</a>
            </li>
            @endif
            @endauth
            <li class="nav-item {{request()->is('cart/*')?'active':''}}">
              <a class="btn btn-outline-primary" href="{{route('cart.index')}}">
                Cart
                <span class="badge badge-light">
                @if(session('cart_count')!='')
                {{ session('cart_count') }}
                @else
                0
                @endif
              </span></a>
              </li>
              @auth
              <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                      @csrf
                      <button class="dropdown-item" type="submit" >Çıkış</button>
                    </form>
                  </div>
                </li>
              </ul>
              
              @else
              <li class="nav-item {{request()->is('login')?'active':''}}">
                <a class="nav-link" href="{{route('login')}}">Login</a>
              </li>
              @if(Route::has('register'))
              <li class="nav-item {{request()->is('register')?'active':''}}">
                <a class="nav-link" href="{{route('register')}}">Register</a>
              </li>
              @endif
              @endauth
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- Page Content -->
      <div class="container">
        <br><br>
        @yield('content')
        <br><br>
      </div>
      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
      <script src="{{ asset('') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
      @if(session('success'))
      Swal.fire(
      '{{session('success')}}',
      '',
      'success'
      );
      //toastr.success("{{session('success')}}");
      @elseif(session('error'))
      Swal.fire(
      '{{session('error')}}',
      '',
      'warning'
      );
      //toastr.warning("{{session('error')}}");
      @endif
      </script>
    </body>
  </html>