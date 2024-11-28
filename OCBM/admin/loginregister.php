<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'adminconnection.php';
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `user_tab` WHERE name = '$name'" ;
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
       echo "username already exist";
    }
  
    else{
        // $exists = false;
        if(($password == $cpassword)){
        $sql = "INSERT INTO `user_tab` (`role_id`,`name`, `phone`, `email`, `password`, `deleted`, `created_on`, `updated_on`) VALUES ('2','$name', '$phone', '$email', '$password', '0', current_timestamp(), current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            // $showAlert = true;
            header('location: loginregistration.php');
        }
     
    }
    else{
        $showError = "Password and Confirm Password should be same";
    }

}


}


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
    integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/registration.css">

  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./css/adminreg.css">
  <style>
    .error{
      color:red;
      font-size:12px;
    }
    </style>

</head>
<body>
<!-- partial:index.partial.html -->

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form id="admin-reg" method="POST" action="/OCBM/admin/loginregister.php">
			<h1>Create Account</h1>

			<span>To buy Your Dream Car Register Yourself</span>
			<input type="text" id="name" name="name" placeholder="Name" />
			<input type="phone" id="phone" name="phone" placeholder="Phone" />
			<input type="email" id="email" name="email" placeholder="Email" />
			<input type="password" id="password" name="password"  placeholder="Password" />
			<input type="password" id="cpassword" name="cpassword"  placeholder="Confirm Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form id="admin-log" method="POST" action="/OCBM/admin/riya.php">
			<h1>Sign in</h1>
	
			<span>Login to buy your Dream Car</span>
			<input type="email" id="email" name="email" placeholder="Email" />
			<input type="password" id="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- partial -->
<script>
                        $(document).ready(function () {
                    
                    $('#admin-reg').validate({
                        rules: {
                            name: {
                                required: true,
                                
                            },
                            phone: {
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
                                required: 'Please enter name'
                            },
                            phone: {
                                required: 'Please enter phone number'
                            },
                            email: {
                                required: 'Please enter valid email'
                            },
                            password: {
                                required: 'Please enter password'
                            },
                            cpassword: {
                                required: 'Please enter Confirm  password'
                            },
                        }

                    });
                })
    </script>
<script>
                        $(document).ready(function () {
                    
                    $('#admin-log').validate({
                        rules: {
                            name: {
                                required: true,
                                
                            },
                            phone: {
                                required: true,
                               
                            },

                            email: {
                                required: true,
                            },
                            password: {
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
                            email: {
                                required: 'Please enter valid email'
                            },
                            password: {
                                required: 'Please enter password'
                            },
                        }

                    });
                })
    </script>
    <script src="./js/adminreg.js"></script>
</body>
</html>