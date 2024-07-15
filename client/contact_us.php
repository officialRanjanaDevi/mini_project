<?php
include "authentication.php";
include "../shared/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental System(MiniProject)</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
      
    <link rel="Stylesheet" href="index.css" />
</head>
<body>
<nav class="navbar  navbar-expand-lg border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Online Bike Rental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
            <li class="nav-item ms-5">
              <a class="nav-link " aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="bike_listing.php">Bike Listing</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link " href="rented.php">Orders</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="faqs.html">FAQs</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link active" href="contact_us.php">Contact us</a>
            </li>
          </ul>
          <button type="button" onclick="location.href = 'cart.php'" class=" btn btn-outline-light border-0 ">
          <i class="fa fa-cart-plus fs-4" aria-hidden="true"></i></button>
          <div class="dropdown dropstart">
          <button class="btn btn-outline-light border-0 dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-sign-out fs-4" aria-hidden="true"></i>
  </button>

  <ul class="dropdown-menu mt-4 bg-light border-2 border-secondary ms-3">
    <li><a class="btn btn-outline-secondary border-0 w-100 rounded-0" href="logout.php">Log Out</a></li>
    <li><a class="btn btn-outline-secondary border-0 w-100 rounded-0" href="#">Your Profile</a></li>
  </ul>
</div>
<i class="fa fa-user-circle-o fs-4 text-light" aria-hidden="true"></i>  
        </div>
      </div>
    </nav>


    <div class="card m-5 w-75 mx-auto border-4 border-dark">
  <h3 class="card-header border-4">Get in touch with us ...</h3>
  <div class="card-body ">
    <form method="POST" action="send_message.php">
    <div class="row mb-3">
    <label for="name" class=" col-sm-2 col-form-label">Name : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Regarding to: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="message" class="col-sm-2 col-form-label ">Message :</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="message" rows="5" required></textarea>
    </div>
  </div>
 
<div class="row mb-3">
  <button type="submit" class="col-sm-3 mx-auto mt-3 btn btn-primary"  >Send</button></div>

</form>
    
  </div>
</div>
<!-- Modal -->

    
  <div class=""style="background-color: #000000">
    <!-- Footer -->
    <footer class="py-5 text-center text-lg-start text-white " >

      <div class=" p-4 pb-0 ">

        <section class="">

          <div class="row mx-5 px-5 ">

            <div class="col-lg-4 col-md-6 mb-4 mb-md-0 pe-5">
            <h5 class="text-uppercase">Contact us</h5>
            <p>+91 9876543210</p>
            <p class='lh-1'>Email us</p>
            <p class="lh-1">mon-fri (9am to 8pm)</p>
              </div>
            <!--Grid column-->


            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mx-5 px-5">
              <h5 class="text-uppercase">Back to</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  
                  <a href="home.php" class="text-white ">Home</a>
                </li>
                <li>
                  <a href="bike_listing.php" class="text-white ">Bike Listing</a>
                </li>
                <li>
                  <a href="rented.php" class="text-white ">Orders</a>
                </li>
                <li>
                  <a href="cart.php" class="text-white ">Wishlist</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 ms-5 ps-5">
              <h5 class="text-uppercase">Customer Service </h5>

              <ul class="list-unstyled mb-0">
              <li>
                  <a href="about_us.html" class="text-white ">About us</a>
                </li>
                <li>
                  <a href="faqs.html" class="text-white ">Faqs</a>
                </li>
                <li>
                  <a href="contact_us.php" class="text-white ">Contact us</a>
                </li>
              
                <li>
                  <a href="contact_us.php" class="text-white ">Help</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="my-4" />
       <div class="d-flex justify-content-center"><h5 class=" text-uppercase text-center mx-2">Thank you for giving your time.</h5> <i class="fa fa-heart-o fs-5 mb-1" aria-hidden="true"></i> </div>
       

     <p class=' text-center'>We provide the best bike rental services in the city. Explore with ease and convenience with our well-maintained bikes and excellent customer service.</p>

       <p class='text-center'>You can follow us here</p>
        <hr class="my-4" />

        <!-- Section: Social media -->
        <section class="mb-4 text-center">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
            <i class="fa fa-facebook" aria-hidden="true"></i></a>

          <!-- Twitter -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
            <i class="fa fa-twitter" aria-hidden="true"></i></a>

          <!-- Google -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
            <i class="fa fa-google" aria-hidden="true"></i></a>

          <!-- Instagram -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
            <i class="fa fa-instagram" aria-hidden="true"></i></a>

          <!-- Linkedin -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
            <i class="fa fa-linkedin" aria-hidden="true"></i></a>

          <!-- Github -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
            <i class="fa fa-github" aria-hidden="true"></i></a>
        </section>
        
       <div class="text-center mb-5">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
      
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->
      
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
