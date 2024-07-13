<?php
include "../shared/connection.php";
include "authentication.php";

$stmt = $conn->prepare("SELECT * FROM registered_user WHERE mail = ?");
    $stmt->bind_param("s",  $_SESSION['usermail']);
   
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // if the client is registered then he can book bikes else he has to first fill the neccassry details in user.php;    
 
    } else {
        header("location:user.php");
    }

    $stmt->close();
    
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
     
 <div class="border border-3  w-75 d-flex justify-content-center m-5 mx-auto">     
<?php
$id= $_POST['name'];
$sql_result = mysqli_query($conn, "SELECT * FROM bikes WHERE id=$id");
while ($row = mysqli_fetch_assoc($sql_result)) {
    echo "
    <div class='card  border border-0 ' style='width: 25rem;'>
  <img src='{$row['img1']}' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h2 class='card-title'>{$row['title']}</h2>
    <p class='card-text'>{$row['overview']}</p>
      <p class='card-text'><b>Fuel Type: </b>{$row['fuel']}</p><b class='ms-2'>Rent: </b>
    <p class='card-text btn btn-danger mt-3'>{$row['rent']} INR/day</p>
    
  </div>
</div>";
}

$stmt = $conn->prepare("SELECT * FROM registered_user WHERE mail = ?");
$stmt->bind_param("s", $_SESSION['usermail']);

// Execute the statement
$stmt->execute();

// Get the result
$sql_result2 = $stmt->get_result();

// Fetch and display the results
while ($row = $sql_result2->fetch_assoc()) {
    echo "
    <div class='card ms-1  border border-0 ' style='width: 30rem;'>
       
        <div class='card-body mt-5'>
        <h3 class='text-center'>Confirmation form</h3>
        <form method='POST' enctype='multipart/form-data' action='order_placed.php' class='row mt-4 ms-2 w-100 '>
    <div class='row mb-1'>
       <h5 class='opacity-50 text-center'>Email: {$row['mail']}</h5>
       
    </div>
    <div class='row mb-3'>
        <label for='name' class='col-sm-4 col-form-label'>Name</label>
        <div class=col-sm-8>
        <input type='text' class='form-control' name='name' value='{$row['name']}' required></div>
    </div>
    <div class='row mb-3'>
        <label for='day' class='col-sm-4 col-form-label'>Rent for</label>
         <div class=col-sm-8>
        <input type='number' class='form-control' name='day' placeholder='1 days' required>
        </div>
    </div>
    <div class='row mb-3'>
        <label for='number' class='col-sm-4 col-form-label'>Contact No.</label>
         <div class=col-sm-8>
        <input type='number' class='form-control' name='number' value='{$row['contact1']}' required>
        </div>
    </div>
   
    <div class='row mb-3'>
        <label for='address' class='col-sm-4 col-form-label'>Address</label>
         <div class=col-sm-8>
        <input type='text' class='form-control' name='address' value='{$row['address1']}' required>
        </div>
    </div>

    <div class='row mb-3'>
        <label for='city' class='col-sm-4 col-form-label'>City</label>
         <div class=col-sm-8>
        <input type='text' class='form-control' name='city' value='{$row['city']}' required>
        </div>
    </div>
    <div class='row mb-3'>
      
                                <input type='hidden' name='id' value='$id'>
                                <input type='submit' class='btn btn-primary' value='Place order'>
        
    </div>
</form>

       <a href='view.php' class='btn btn-warning w-100 ms-1'>Back</a>
        </div>
    </div>";
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>

</div>
     

     

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

