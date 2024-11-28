<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include ('../user/dbconnection.php');
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `customers` WHERE customer_email ='$email' AND  customer_password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        echo ("Login successfully");
    }
    else{
        echo ("OOps! FAILED TO LOGIN");
    }
}

?>