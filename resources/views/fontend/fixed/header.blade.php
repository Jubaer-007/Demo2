<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{route('web.home')}}">Catering</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0 ">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('web.home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('home.menu')}}">Menu</a></li>
          <li><a class="nav-link scrollto" href="{{route('home.combo')}}">Combo</a></li>
          <li><a class="nav-link scrollto" href="{{route('home.event')}}">Event</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->

          <li ><a class="nav-link scrollto" href="{{route('cart.view')}}" style="margin-left:35px;"> <span class="badge bg-success px-3 py-3" style="font-size:13px">Cart {{session()->has('cart')?count(session()->get('cart')):0}} items
        </span></a></li></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="">
        @if (auth('customer')->user())
            <span> {{auth('customer')->user()->name}}</span>
          <a href="{{route('customer.logout')}}">Logout</a>

          @else

          <a href="{{route('customer.loginForm')}}">Login</a>
          
        @endif

     <a class="btn btn-primary" href="{{route('login.form')}}">Admin</a>
    </div>
    </div>
  </header><!-- End Header -->


