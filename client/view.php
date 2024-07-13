<?php
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
    <nav class=" navbar navbar-expand-lg  border-body border-bottom" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Online Bike Rental</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item ms-5">
                <a class="nav-link" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item ms-5">
                <a class="nav-link" href="about_us.html">About us</a>
              </li>
              <li class="nav-item ms-5">
                <a class="nav-link active" href="bike_listing.html">Bike Listing</a>
              </li>
              <li class="nav-item ms-5">
                <a class="nav-link" href="faqs.html">FAQs</a>
              </li>
              <li class="nav-item ms-5">
                <a class="nav-link" href="contact_us.html">Contact us</a>
              </li>
            </ul>
            <button type="button" class="btn navbar-text btn-outline-dark">
              Login/Sign Up
            </button>
          </div>
        </div>
      </nav>


    
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
                        <div class='carousel-item' data-bs-interval='10000'>
                            <img class='bd-placeholder-img bd-placeholder-img-lg d-block w-100' width='800' height='600' src='{$row['img1']}' role='img' aria-label='Placeholder: First slide' preserveAspectRatio='xMidYMid slice' focusable='false'>
                        </div>
                        <div class='carousel-item active' data-bs-interval='2000'>
                            <img class='bd-placeholder-img bd-placeholder-img-lg d-block w-100' width='800' height='600' src='{$row['img2']}' role='img' aria-label='Placeholder: Second slide' preserveAspectRatio='xMidYMid slice' focusable='false'>
                        </div>
                        <div class='carousel-item' data-bs-interval='3000'>
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
                    <div class='card-body'>
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
                           <form method='POST' action='order.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='btn btn-primary' value='Book Now'>
                            </form>
                        </div>
                        <a href='order.php' class='btn btn-warning w-100 mt-2'>Back</a>
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
            echo "
           
                <div class='col'>

                    <div class='card border-2 border-black' style='width: 18rem; height:30rem;'>
                          
                         <img src='{$row['img1']}' class='card-img-top' alt='...'>
                        <div class='card-body '>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <div class='card-text'>
                            <p >{$row['overview']}</p>
                        
                            <p ><b>Fuel Type:</b> {$row['fuel']} <b class='ms-4'>Capacity :</b>{$row['capacity']}</p>
                            </div>
                            
                            <form method='POST' action='view.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='my-2 btn btn-sm btn-warning w-100' value='View more details'>
                            </form>
                            <div class='d-flex justify-content-between'>
                            <p class='btn btn-danger  h-25'>{$row['rent']} INR /Day</p>
                           <form method='POST' action='order.php'>
                                <input type='hidden' name='name' value='{$row['id']}'>
                                <input type='submit' class='btn btn-primary' value='Book Now'>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                
            ";
            
        }
        ?>
        
    </div>
    </div>

     

    <!-- carousel starts -->
 

  <!-- carousal ends -->

      <!--footer  starts-->
      <div class="border-1 border-top">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white " style="background-color: #000000">
          <!-- Grid container -->
          <div class=" p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
              <!--Grid row-->
              <div class="row mx-5 px-5 ">
                <!--Grid column-->
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
                      <a href="#!" class="text-white">Link 1</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 2</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 3</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 4</a>
                    </li>
                  </ul>
                </div>
                <!--Grid column-->
    
                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0 ms-5 ps-5">
                  <h5 class="text-uppercase">Links</h5>
    
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#!" class="text-white">Link 1</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 2</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 3</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 4</a>
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
                <span class="me-3">Register for free</span>
                <button type="button" class="btn btn-outline-light btn-rounded">
                  Sign up!
                </button>
              </p>
            </section>
            <!-- Section: CTA -->
    
            <hr class="mb-4" />
    
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
              <!-- Facebook -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                  class="fab fa-facebook-f"></i></a>
    
              <!-- Twitter -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
    
              <!-- Google -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
    
              <!-- Instagram -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
    
              <!-- Linkedin -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                  class="fab fa-linkedin-in"></i></a>
    
              <!-- Github -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
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
 
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

