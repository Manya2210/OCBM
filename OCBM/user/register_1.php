<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include ('../user/dbconnection.php');
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $addr = $_POST["addr"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists = false;

    $existSql = "SELECT * FROM `customers` WHERE customer_name = '$name'" ;
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exist";
    }
  
    else{
        // $exists = false;
        if(($password == $cpassword)){
        $sql = "INSERT INTO `customers` (`role_id`,`customer_name`, `customer_phone`, `customer_address`, `customer_email`, `customer_password`, `deleted`, `created_on`, `updated_on`) VALUES ('2','$name', '$phone', '$addr', '$email', '$password', '0', current_timestamp(), current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            // $showAlert = true;
        }
     
    }
    else{
        $showError = "Password and Confirm Password should be same";
    }

}


}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
    integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./assets/css/registration.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Car-Buying</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
       <?php
        
        if($showAlert){

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your account has created now you can login.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>';
        }
        if($showError){

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Failed! </strong>'.$showError.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>';
        }
          ?>
    <form action="/OCBM/user/register.php" id="reslog" method="POST">
    <div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" id="name" name="name" placeholder="Username">
						</div>
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="phone" id="phone" name="phone" placeholder="Phone">
						</div>
                        <div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input type="text" id="addr" name="addr" placeholder="Address">
						</div>
						<div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input type="email" id="email" name="email" placeholder="Email">
						</div>
					
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" id="password" name="password" placeholder="Password">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" id="cpassword"  name="cpassword"  placeholder="Confirm password">
						</div>
						<button type="submit" class="btn btn-primary ">
							Sign up
						</button>
						<p>
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
						</p>
					</div>
                </form>
				</div>
			
			</div>
     
       
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
                    <form action="/OCBM/user/login.php" id="logres" method="POST">
					<div class="form sign-in">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="email" id="email" name="email" placeholder="Email">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" id="password" name="password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary ">
							Sign in
						</button>
						<p>
							<b>
								Forgot password?
							</b>
						</p>
						<p>
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
						</p>
					</div>
				</div>
            </form>
				<div class="form-wrapper">
		
				</div>
			</div>
     
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome
					</h2>
	
				</div>
				<div class="img sign-in">
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up">
					<h2>
						Join with us
					</h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>
    <script>
                        $(document).ready(function () {
                    
                    $('#reslog').validate({
                        rules: {
                            name: {
                                required: true,
                                
                            },
                            phone: {
                                required: true,
                               
                            },
                            addr: {
                                required: true,
                               
                            },
                            email: {
                                required: true,
                            },
                            password: {
                                required: true,
                            },
                            cpassword: {
                                required: true,
                            },
                        },
                        messages: {
                            name: {
                                required: 'Please enter Firstname'
                            },
                            phone: {
                                required: 'Please enter phone number'
                            },
                            addr: {
                                required: 'Please enter Address'
                            },
                            email: {
                                required: 'Please enter valid email'
                            },
                            password: {
                                required: 'Please enter password'
                            },
                            cpassword: {
                                required: 'Please enter confirm password'
                            },
                        }

                    });
                })
    </script>
    <script>
                        $(document).ready(function () {
                    
                    $('#logres').validate({
                        rules: {
                            email: {
                                required: true,
                            },
                            password: {
                                required: true,
                            },
                        },
                        messages: {
                            email: {
                                required: 'Please enter valid email'
                            },
                            password: {
                                required: 'Please enter password'
                            }
                        }

                    });
                })
    </script>
    <script>
        let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200)
    </script>
 
</body>
</html>