
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'dbconnection.php';
// $sql = "SELECT * FROM detail_car ";
// $result = $conn->query($sql);

if(isset($_GET['carmodelId']))
{
  $carmodelId = $_GET['carmodelId'];
  $sql = "SELECT * FROM detail_car WHERE id = $carmodelId";
}else{
  $sql = "SELECT * FROM detail_car";
}
$result = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Car-Buying</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    </head>
    
    <body>
        
 
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Car Dealer<em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="cars.php" class="active">Cars</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.php">About Us</a>
                                    <a class="dropdown-item" href="team.php">Team</a>
                                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                                    <a class="dropdown-item" href="faq.php">FAQ</a>
                                    <a class="dropdown-item" href="terms.php">Terms</a>
                                </div>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
              
                            <li><a href="cart.php" >Cart<i class="fa-sharp fa-solid fa-cart-shopping"></i></a></li>
                           
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Find Your Dream Car</h2>
                        <p><em>We Are Here to Help You to buy Your Dream Car</em><p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <?php if ($result->num_rows > 0) {
                     while ($rows=$result->fetch_assoc()){?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 h-80" src="../admin/carmodel/<?php echo $rows['doc']; ?>" alt="First slide">
                </div>
                <!-- <div class="carousel-item">
                  <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Third slide">
                </div> -->
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
            <br>
            <br>

            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                  <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                  <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact Details</a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content' style="width: 100%;">
                
                  <article id='tabs-1'>
                    <h4>Vehicle Specs</h4>

                    <div class="row">
                       <div class="col-sm-6">
                            <label>Type</label>
                       
                            <p><?php echo $rows['type']; ?></p>
                       </div>
                       <div class="col-sm-6">
                             <label> Model</label>
                             <?php
                                $sql1 = "SELECT name FROM carmodel WHERE id = $carmodelId";
                                $result1 = $conn->query($sql1);
                                $rows1=$result1->fetch_assoc();  
                              ?>
                             <p><?php echo $rows1['name']; ?></p>
                        </div>
                       <div class="col-sm-6">
                         <label>Mileage</label>
                         
                         <p><?php echo $rows['mileage']; ?></p>
                        </div>
                        
                        <div class="col-sm-6">
                          <label>Fuel</label>
                          
                          <p><?php echo $rows['fuel']; ?></p>
                        </div>
                        
                        <div class="col-sm-6">
                          <label>Engine size</label>
                          
                          <p><?php echo $rows['enginesize']; ?></p>
                        </div>
                        
                        <div class="col-sm-6">
                          <label>Power</label>
                          
                          <p><?php echo $rows['power']; ?></p>
                        </div>
                        
                        
                        <div class="col-sm-6">
                          <label>Gearbox</label>
                          
                          <p><?php echo $rows['gearbox']; ?></p>
                        </div>
                        
                        <div class="col-sm-6">
                          <label>Number of seats</label>
                          
                          <p><?php echo $rows['seat']; ?></p>
                        </div>
                      
                        
                      </div>
                      <!-- <button type="submit" name="Add_To_Cart" class="btn btn-primary" >Add to cart</button> -->
                     
                      
                    <div class="car1">
                    <!-- <button class="cart-button">
                      <span class="add-to-cart" >Add to cart</span>
                      <span class="added">Added</span>
                      <i class="fa-solid fa-cart-shopping"></i>
                      <i class="fa-regular fa-box"></i>
                    </button> -->
                    
<!--                     
                    <a class="youtube-link" href="https://youtu.be/BVdTKEi269Y" target="_blank">https://youtu.be/BVdTKEi269Y</a>
                   --> 
                   </div> 
                  </article>
                  
                  <article id='tabs-2'>
                    <h4>Vehicle Description</h4>
                    <p><?php echo $rows['description']; ?></p> 
                    <?php  }} ?>
                   </article>
                 <?php   $sql = "SELECT * FROM contact_info";
                    $result = $conn->query($sql);
                    $rows=$result->fetch_assoc();
?>
                  <article id='tabs-4'>
                    <h4>Contact Details</h4>

                    <div class="row">   
                        <div class="col-sm-6">
                            <label>Name</label>

                            <p><?php echo $rows['name']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <label>Phone</label>

                            <p><?php echo $rows['phone']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <label>Address</label>
                            <p><?php echo $rows['address']; ?> </p>
                        </div>
                        <div class="col-sm-6">
                            <label>Email</label>
                            <p><a href="#"><?php echo $rows['email']; ?></a></p>
                        </div>
                    </div>
                  </article>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
   <?php include_once('footer.php') ?>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
  const cartButtons = document.querySelectorAll('.cart-button');

cartButtons.forEach(button => {
  button.addEventListener('click', cartClick);
});

function cartClick() {
  let button = this;
  button.classList.add('clicked');
}
    </script>

  </body>
</html>