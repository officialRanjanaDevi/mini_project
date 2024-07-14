<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bike Rental System(MiniProject)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="Stylesheet" href="index.css">
</head>

<body>

  <div class="card-img-overlay">
    <!-- navbar starts -->
    <nav class="navbar  navbar-expand-lg bg-transparent border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Online Bike Rental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
            <li class="nav-item ms-5">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="about_us.html">About us</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="bike_listing.php">Bike Listing</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="faqs.html">FAQs</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="login.html">Contact us</a>
            </li>
          </ul>
          <button type="button" onclick="location.href = 'signup.html';" class="me-2 btn navbar-text btn-outline-light">
            Login/Sign Up
          </button>
          <i class="fa fa-user-circle-o fs-4 text-light" aria-hidden="true"></i>  
        </div>
      </div>
    </nav>
    <!-- navbar ends -->
  </div>
  <!-- carousel starts -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item" data-bs-interval="10000">
        <img class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="700" src="images/bgimg1.jpg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#f5f5f5"></rect>

        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item active" data-bs-interval="2000">
        <img class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="700" src="images/bgimg2.jpg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#eee"></rect></img>
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="700" src="images/bgimg3.jpg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#e5e5e5"></rect></img>
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- carousal ends -->



  <!-- bike section starts -->
  <div class=" bike-section section-header text-center">
    <h2>Find the Best <span>Bike For You</span></h2>
    <p>You will be able to fully enjoy your holiday and your ride! Any problems? Our passionate team will be happy to
      help you!! No waste of time during your holidays to find a rental point on the spot! No language barrier, thanks
      to our multilingual team! At the same price you would pay on the spot! We have best bikes with best deals</p>
  </div>
  <div class="border-2 ps-5 pe-5 mb-5">
    <div class="card-group">
        <?php
        include "../shared/connection.php";
        $count = 1;
        $sql_result = mysqli_query($conn, "SELECT * FROM bikes");
        while ($row = mysqli_fetch_assoc($sql_result)) {
            if($count==8){
                break;
            }
            echo "
                <div class='col'>
                    <div class='card border-2 border-black' style='width: 18rem; height:25rem;'>
                        <img src='{$row['img1']}' class='card-img-top' alt='...'>
                        <div class='card-body '>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text'>{$row['overview']}</p>
                            <div class='d-flex justify-content-evenly'>
                            <p class='btn btn-danger '>{$row['rent']} INR /Day</p>
                            <a href='bike_listing.php' class='btn btn-primary h-50'>View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            $count++;
        }
        ?>
        
    </div>
</div>



  <!-- how to book bike -->
  <section class="bike-book border-bottom border-black border-2 mb-5 py-5 d-flex flex-column align-items-center">
    <h2>How To Use ?</h2>
    <div class="d-flex py-5">
      <div class="card border border-0 " style="width: 15rem;">
        <img src="images/Symbol1.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5>Select Rental Product</h5>
          <p class="card-text">You can search and select product from our wide range.</p>
        </div>
      </div>
      <div class="card  border-0" style="width: 15rem;">
        <img src="images/Symbol2.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5>Add To Cart</h5>
          <p class="card-text">Easily add multiple product in your cart or direct book from "Book Now" button.</p>
        </div>
      </div>
      <div class="card  border-0" style="width: 15rem;">
        <img src="images/Symbol3.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5>Pick Your Product</h5>
          <p class="card-text">Pick the product from the mentioned location.</p>
        </div>
      </div>
      <div class="card  border-0" style="width: 15rem;">
        <img src="images/Symbol4.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5>Ride Anywhere</h5>
          <p class="card-text">We do not have kms limit.</p>
        </div>
      </div>
    </div>
  </section>


  <!--  additional information about site -->
  <section class="mt-5 ps-3 d-flex justify-content-center">

    <div class="row row-cols-2 row-cols-md-3 g-5 ms-5 ps-5">
      <div class="col gx-5 ">
        <div class="card border-0 add-info-card">
          <img src="images/path.png" class="card-img-top h-75 " alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">No Riding Limits</h5>
            <p class="card-text">Odometer Won't Scare You Anymore.</p>
          </div>

        </div>
      </div>
      <div class="col gx-5">
        <div class="card border-0 h-100 add-info-card">
          <img src="images/helmet.png" class="card-img-top h-75" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Freebies</h5>
            <p class="card-text">Helmets Always, Sometimes More.</p>
          </div>

        </div>
      </div>
      <div class="col gx-5">
        <div class="card border-0 h-100 add-info-card">
          <img src="images/payment.jpg" class="card-img-top h-75" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Secure Payments</h5>
            <p class="card-text">Our Payment Partners are Industry Leaders.</p>
          </div>

        </div>
      </div>



      <div class="col gx-5">
        <div class="card border-0 h-100 add-info-card">
          <img src="images/24hrs.png" class="card-img-top h-75" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">No Bullshit</h5>
            <p class="card-text">A Day Rent is simply for 24 hrs,We mean it.</p>
          </div>

        </div>
      </div>
      <div class="col gx-5">
        <div class="card border-0 h-100 add-info-card">
          <img src="images/salesman.png" class="card-img-top h-75" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Verified Dealers</h5>
            <p class="card-text">Every Single Dealer is Comiited to Quality Service.</p>
          </div>

        </div>
      </div>
      <div class="col gx-5">
        <div class="card border-0 h-100 add-info-card">
          <img src="images/money.png" class="card-img-top h-75" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">100% Moneyback</h5>
            <p class="card-text">Not Happy With Service ,Get your Money Back.</p>
          </div>

        </div>
      </div>
    </div>

  </section>




  <!-- customer review section -->
  <div class="customer-review mt-5 pt-5 ">
    <div class="card mb-3 z-n1 position-absolute">
      <img src="images/bgscooter.png" class="opacity-75 card-img-top " alt="...">
    </div>
    <div class="d-flex flex-column">


      <div class="my-5 pt-5 text-light align-self-center">
        <h2><span class="fw-bold text-center   ">Our Satisfied </span>customer review</h2>
      </div>

      <div class="d-flex justify-content-center review">



        <div class="card review mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/review.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Ella</h5>
                <p class="card-text">This is amazing! I mean really such great bike for rent at affordable price. oh
                  this is crazy man!</p>
                <i class="fa fa-star text-warning " aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="card review ms-5 mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/review2.0.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Karan</h5>
                <p class="card-text">
                  I think this is the one and only top bike rental site in the world. 4-Stars from me - Full
                  satisfaction, no complain at all</p>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>


  <div class="mt-5">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-white " style="background-color: #000000">

      <div class=" p-4 pb-0">

        <section class="">

          <div class="row mx-5 px-5 ">

            <div class="col-lg-4 col-md-6 mb-4 mb-md-0 pe-5">
              <h5 class="text-uppercase">FOOTER CONTENT</h5>

              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestiae modi cum ipsam ad, illo possimus laborum ut
                reiciendis obcaecati. Ducimus, quas. Corrupti, pariatur eaque?
                Reiciendis assumenda iusto sapiente inventore animi?
              </p>
            </div>
            <!--Grid column-->


            <!--Grid column-->
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0 mx-5 px-5">
              <h5 class="text-uppercase">Links</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="index.html" class="text-white">Home</a>
                </li>
                <li>
                  <a href="about_us.html" class="text-white">About us</a>
                </li>
                <li>
                  <a href="faqs.html" class="text-white">Faqs</a>
                </li>
                <li>
                  <a href="contact_us.html" class="text-white">Contact us</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0 ms-5 ps-5">
              <h5 class="text-uppercase">Links</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#" class="text-white">Bike Listing</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Orders</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Wishlist</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Help</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="mb-4" />

        <!-- Section: CTA -->
        <section class="">
          <p class="d-flex justify-content-center align-items-center">
            <span class="me-3">Admin Login</span>
            <button type="button" onclick="location.href = 'admin_login.html';" class="btn btn-outline-light btn-rounded">
              Login Now!
            </button>
          </p>
        </section>
        <!-- Section: CTA -->

        <hr class="mb-4" />

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
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

</div>