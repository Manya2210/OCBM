<?php
session_start();
// session_destroy();
 ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'dbconnection.php';
if(isset($_GET['carId']))
{
  $carId = $_GET['carId'];
  $sql = "SELECT * FROM carmodel WHERE car_id = $carId";
}else{
  $sql = "SELECT * FROM carmodel";
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
    <style>
        .carousel-inner{
            height:20%p;
        }
        .social-icons a{
          float:right;
        }
    </style>
    
    <body>
        <!-- <?php   print_r($_SESSION['cart']);


?> -->
 
    
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
                            <?php  
                            $count=0;
                            if(isset($_SESSION['cart']))
                            {
                              $count=count($_SESSION['cart']);
                            }
                            ?>
                            <li><a href="cart.php" >Cart (<?php echo $count; ?>)<i class="fa-sharp fa-solid fa-cart-shopping"></i></a></li>
                           
                           
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
        
            <div class="row">
            <?php if ($result->num_rows > 0) {
                     while ($rows=$result->fetch_assoc()){?>
            <div class="col-lg-4 text-center">
                <form action="manage_cart.php" method="POST">
                    <div class="trainer-item">
                        <div class="image-thumb">
                        <img src="../admin/carmodel/<?php echo $rows['doc']; ?>">
                        </div>
                        <div class="down-content">
                            <span class="text-center">
                            <?php echo $rows['name'];?>
                            </span><br>
                            <span class="text-center">
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup><?php echo $rows['price'];?>
                            </span><br>
                         <center>
                                Year: <?php echo $rows['year'];?> &nbsp;&nbsp;
                                Color: <?php echo $rows['color'];?>
                        </center>
                        <br>
                            <!-- <p class="text-center">
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p> -->

                            <ul class="social-icons text-left">
                                <button type="submit" name="Add_To_Cart" class="btn btn-primary" >Add to cart</button>
                                <a href="car-details.php?carmodelId=<?php echo $rows['id']; ?>">+ See <?php echo $rows['name'];?> Car Details</a>
                                <input type="hidden" name="Item_Name" value="<?php echo $rows['name'];?>">
                                <input type="hidden" name="Price" value="<?php echo $rows['price'];?>">
                            </ul>
                        </div>
                    </div>
                    </form>
                </div>
                <?php }} ?>
             </div>


                     </section>
             <?php include_once('footer.php'); ?>
         
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