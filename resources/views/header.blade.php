<header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="{{ route('landingpage') }}">
          <span>
            Timups
          </span>
        </a>

        <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('landingpage') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('shop.index') }}"> Watches </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('aboutus') }}"> About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Log in</a>
            </li>
            @else
            <li class="nav-item">
              <a  
              class="nav-link"
              href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               Log out
           </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          
            @endguest


           
          </ul>

          <div class="user_option-box order-1 order-lg-2">
            <a href="{{ route('users.edit') }}" style="color: black;text-transform: uppercase
            ;margin-left: 23px;font-size: 25px">
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
           
           

            <div id="myOverlay" class="overlay">
              <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
              <div class="overlay-content">
                <form action="{{ route('search') }}" method="GET">

                  <input type="text" placeholder="Search.." name="query">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
         
            <button class="openBtn" onclick="openSearch()"> <i class="fa fa-search" aria-hidden="true"></i></button>

          </div>
          
        </div>

        <a href="{{ route('cart.index') }}" class="ml-0 ml-lg-3 order-1 order-lg-2"
        style="color: black;text-transform: uppercase
        ;font-size: 25px" class="order-1">
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
          @if (Cart::instance('default')->count() > 0)
          <span style="color: green;font-weight: bolder">{{ Cart::instance('default')->count() }}</span>
          @endif
        </a>

        

       
        
      </nav>
    </div>
  </header>