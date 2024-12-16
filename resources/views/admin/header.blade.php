<style>
.navbar.bg-light {
    border-bottom: 3px solid #3EA99F; /* Green border at the bottom */
    border-radius: 0 0 10px 10px; /* Round the bottom corners only */
    padding-bottom: 10px; /* Optional: Add some space above the border */
    margin-bottom: 20px; /* Optional: Add space below the header */

}


</style>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('admin.products.create') }}">Create Product</a>
          <a class="dropdown-item" href="{{ route('admin.products.index') }}">View Products</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('admin.categories.create') }}">Create Category</a>
          <a class="dropdown-item" href="{{ route('admin.categories.index') }}">View Categories</a>
        </div>
      </li>
    </ul>
            <!-- Log out               -->
            <div class="nav-item">   
            <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Logout</button>

            </form>    
  </div>
</nav>
</header>


