<!-- Top Header Section -->
<nav class="navbar navbar-expand-lg bg-dark text-white">
    <div class="container-fluid">
      <div class="team-social">
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/reduan97" class="text-white"role="button"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/reduan97" class="text-white"role="button"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/reduan97" class="text-white"role="button"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <div class="ms-auto d-flex">
        <li class="main-menu-li d-inline ">
          <a href="" class="">
            Account
          </a>
        </li>
        <li class="main-menu-li">
          <a href="login-regi.html"><i class="fas fa-user-circle fa-2x " style="margin-left: 13px ; display: inline; "></i></a>
        </li>
        <!-- <h1 class=" text-white d-inline">Reduan</h1> -->
      </div>
      </div>
    </div>
  </nav>
<!--===============header Start===============-->





  <!-- Header Area Start -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-expand-sm sticky-top" style="background: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9))">
    <div class="container-fluid">
      <a href="index.html" class="h1 ps-md-5">NPI <span class="text-danger"> COLLEGE</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link ms-md-5 me-4 active navber-item-a " aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mx-md-4 navber-item-a " aria-current="page" href="#">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mx-md-4 navber-item-a " aria-current="page" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mx-md-4 navber-item-a " aria-current="page" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mx-md-4 navber-item-a " aria-current="page" href="#">Contact</a>
          </li>
        </ul>
        <div class="header-actions me-md-5 float-end">

            <a href="{{ route('login') }}" class="header-action-btn login-btn">Sign In</a>
          <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                <i class="fas fa-search"></i></a>
            <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
              <i class="far fa-heart"></i>
            </a>

            <a href="#offcanvas-cart"
              class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
              <i class="fas fa-cart-plus"></i>
              <span class="header-action-num">01</span>
            </a>

            <a href="#offcanvas-mobile-menu"
              class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
              <i class="pe-7s-menu"></i>
            </a>
        </div>
    </div>
</div>
</nav>

  <div class="modal popup-search-style" id="searchActive">
    <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    <div class="modal-overlay">
      <div class="modal-dialog p-0" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="text-danger">Search Your Product</h2>
            <form class="navbar-form position-relative" role="search">
              <div class="form-group">
                <input type="text" class="form-control text-white" placeholder="Search here...">
              </div>
              <button type="submit" class="submit-btn"><i class="fas fa-search"> </i> </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Header Area End -->
  <div class="modal popup-search-style" id="searchActive">
    <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    <div class="modal-overlay">
      <div class="modal-dialog p-0" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="text-danger">Search Your Product</h2>
            <form class="navbar-form position-relative" role="search">
              <div class="form-group">
                <input type="text" class="form-control text-white" placeholder="Search here...">
              </div>
              <button type="submit" class="submit-btn"><i class="fas fa-search"> </i> </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
