<?php
 include "../shared/connection.php";
 include "authentication.php";
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
</div></nav>

    
      <div class="container my-4">
    <?php 
    $id = $_POST['name'];
    $stmt = $conn->prepare("SELECT * FROM bikes WHERE id=?");
    $stmt->bind_param('i', $id); // Use parameterized query to prevent SQL injection
    $stmt->execute();
    $sql_result = $stmt->get_result();

    while ($row = mysqli_fetch_assoc($sql_result)) {
        echo "
        <div class='card border-dark border-2 mb-3' style='max-width:80rem;'>
            <div class='row g-0'>
                <div id='carouselExampleDark' class='z-3 my-1 col-md-8 carousel carousel-dark slide' data-bs-ride='carousel'>
                    <div class='carousel-indicators'>
                        <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='0' aria-label='Slide 1'></button>
                        <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='1' class='active' aria-current='true' aria-label='Slide 2'></button>
                        <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='2' aria-label='Slide 3'></button>
                    </div>
                    <div class='carousel-inner ms-1'>
                        <div class='carousel-item' data-bs-interval='3000'>
                            <img class='bd-placeholder-img bd-placeholder-img-lg d-block w-100' width='800' height='600' src='{$row['img1']}' role='img' aria-label='Placeholder: First slide' preserveAspectRatio='xMidYMid slice' focusable='false'>
                        </div>
                        <div class='carousel-item active' data-bs-interval='2000'>
                            <img class='bd-placeholder-img bd-placeholder-img-lg d-block w-100' width='800' height='600' src='{$row['img2']}' role='img' aria-label='Placeholder: Second slide' preserveAspectRatio='xMidYMid slice' focusable='false'>
                        </div>
                        <div class='carousel-item' data-bs-interval='2000'>
                            <img class='bd-placeholder-img bd-placeholder-img-lg d-block w-100' width='800' height='600' src='{$row['img3']}' role='img' aria-label='Placeholder: Third slide' preserveAspectRatio='xMidYMid slice' focusable='false'>
                        </div>
                    </div>
                    <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleDark' data-bs-slide='prev'>
                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                        <span class='visually-hidden'>Previous</span>
                    </button>
                    <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleDark' data-bs-slide='next'>
                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                        <span class='visually-hidden'>Next</span>
                    </button>
                </div>
                <div class='col-md-4'>
                    <div class='z-3 card-body'>
                        <h1 class='card-title'>{$row['title']}</h1>
                        <div class='card-text'>
                            <p><b>Overview:</b> {$row['overview']}</p>
                            <p><b>Brand:</b> {$row['brand']}</p>
                            <p><b>Model year:</b> {$row['year']}</p>
                            <p><b>Fuel Type:</b> {$row['fuel']} <b class='ps-5'>Seat Capacity :</b> {$row['capacity']} Person</p>
                        </div>
                        <b>Accessories :</b>
                        ";
                        if ($row['Break'] == 1) {
                            echo "<p>Anti-Lock Breaking System</p>";
                        }
                        if ($row['breakAssit'] == 1) {
                            echo "<p>Break Assit</p>";
                        }
                        if ($row['crashSensor'] == 1) {
                            echo "<p>Crash Sensor</p>";
                        }
                        if ($row['smoothHandling'] == 1) {
                            echo "<p>Smooth Handling</p>";
                        }
                        if ($row['centralLocking'] == 1) {
                            echo "<p>Central Locking</p>";
                        }
                        if ($row['LeatherSeats'] == 1) {
                            echo "<p>Leather Seats</p>";
                        }
                        echo "
                        <div class='d-flex justify-content-between mt-2'>
                            <p class='btn btn-danger h-25'>{$row['rent']} INR /Day</p>  
                           <form method='POST' action='addtocart.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='btn btn-warning' value='Add to cart'>
                            </form> </div>
                           <form method='POST' action='order.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='btn btn-lg w-100 btn-primary' value='Book Now'>
                            </form>
                     
                        <a href='bike_listing.php' class='btn btn-secondary w-100 mt-4'>Back</a>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>
</div>


      


      <div class="container  my-5">
      <h2 class="text-center" >Similar Bikes</h2>
        <div class='card-group my-5'>
        <?php
      
        $count = 1;
        $sql_result = mysqli_query($conn, "SELECT * FROM bikes");
        while ($row = mysqli_fetch_assoc($sql_result)) {
          if($count==5){break;};
            echo "
               
                <div class='col'>

                    <div class='card border-3 border-black' style='width: 20rem; height:33rem;'>
                          
                         <img src='{$row['img1']}' class='card-img-top h-50' alt='...'>
                        <div class='card-body '>
                            <h5 class='card-title'>{$row['title']}</h5>
                            
                            <p  class='card-text' >{$row['overview']}</p>
                        
                            <p  class='card-text'><b>Fuel Type:</b> {$row['fuel']} <b class='ms-4'>Capacity :</b>{$row['capacity']}</p>
                            
                            
                          
                          <a class='btn btn-sm btn-danger   w-100'>{$row['rent']} INR /Day</a>
                            <form method='POST' action='view.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='my-1 btn btn-sm btn-secondary w-100' value='View more details'>
                            </form>
                            <div class='d-flex justify-content-between'>
                           <form method='POST' action='addtocart.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='btn btn-warning' value='Add to cart'>
                            </form>
                           <form method='POST' action='order.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='btn btn-primary' value='Book Now'>
                            </form> </div>
                        </div>
                    </div>
                </div>

                
            ";$count++;
            
        }
        ?>
        
    </div>
    </div>

     

    <!-- carousel starts -->
 

  <!-- carousal ends -->

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
    


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>  

