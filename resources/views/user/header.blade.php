<style>
.navbar.navbar-expand-lg.navbar-light {
    border-bottom: 3px solid #B8BC86; /* Green border at the bottom */
    border-radius: 0 0 10px 10px; /* Round the bottom corners only */
    padding-bottom: 10px; /* Optional: Add some space above the border */
    margin-bottom: 20px; /* Optional: Add space below the header */
    width: 100%;
    height: 100px;
}

.navbar-nav.ms-auto {
    margin-left: auto;
    display: flex;
    align-items: center; /* Ensures vertical centering */
}

.navbar-nav .nav-item {
    display: flex;
    align-items: center; /* Aligns the logout button with other items */
}

.navbar-nav .nav-item .btn-secondary {
    font-size: 12px; /* Adjust button size */
    padding: 10px 20px; /* Adjust padding to make button smaller */
    margin-right: 50px; /* Space between logout button and other items */
    margin-top: 50px;
    border-radius: 20px; /* Makes the button have rounded edges */
    border: none; /* Removes border to make it look cleaner */
    background-color: #6c757d; /* Ensure the background color matches */
}

/* Style for the shopping bag icon */
.nav-link {
    display: flex;
    align-items: center; /* Vertically centers the icon and the cart count */
}

.nav-link .fa-shopping-bag {
    font-size: 20px; /* Size of the icon */
    margin-right: 8px; /* Space between the icon and the cart count */
    color: white; /* Icon color */
}

/* Style for the cart count next to the icon */
.cart-count {
    font-size: 16px; /* Adjust the font size of the cart count */
    color: white; /* Text color */
    background-color: red; /* Background color of the cart count */
    padding: 0 8px; /* Space around the cart count */
    border-radius: 10px; /* Rounded edges */
}



</style>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #B8BC86; padding: 10px;">
  <a class="navbar-brand text-white" href="#" style="font-weight: bold;">Paws & Pages</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">BestSellers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Stationery</a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      @if(Route::has('login'))
        @auth
          <li class="nav-item">
            <a href="{{ route('view.cart') }}" class="nav-link text-white">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              <span>Cart : {{ $cartCount }}</span>
            </a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-secondary btn-sm ms-2" >Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link text-white">
              <i class="fa fa-user" aria-hidden="true"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link text-white">
              <i class="fa fa-user-plus" aria-hidden="true"></i> Register
            </a>
          </li>
        @endauth
      @endif
    </ul>
  </div>
</nav>
