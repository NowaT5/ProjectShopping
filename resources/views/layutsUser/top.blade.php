<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light"><a href=""><span>MU-TAE-CUTE</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="active " href="{{route('Home')}}">Home</a></li>
                <li><a href="{{route('About')}}">About</a></li>
                <li><a href="{{route('Portfolio')}}">Portfolio</a></li>
                {{-- <li class="dropdown"><a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown"><a href="#"><span>หินอเมทิสต์</span></a></li>
                        <li class="dropdown"><a href="#"><span>หินอควอมารีน</span></a></li>
                        <li class="dropdown"><a href="#"><span>หินทับทิม</span></a></li>
                    </ul>
                </li> --}}
                <li><a href="">Services</a></li>
                <li class="dropdown"><a href="">Proflie</a>
                    <ul>
                        <li class="dropdown"><a href="#"><span>ชื่อ : </span></a></li>
                        <li class="dropdown"><a href="#"><span>Email : </span></a></li>
                        <li class="dropdown"><a href="#"><span>logout</span></a></li>
                    </ul>
                </li>

                <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
{{-- <li class="dropdown"><a href="#"><span>หินอควอมารีน</span> <i class="bi bi-chevron-right"></i></a>
    <ul>
      <li><a href="#">Deep Drop Down 1</a></li>
      <li><a href="#">Deep Drop Down 2</a></li>
      <li><a href="#">Deep Drop Down 3</a></li>
      <li><a href="#">Deep Drop Down 4</a></li>
      <li><a href="#">Deep Drop Down 5</a></li>
    </ul>
  </li> --}}
