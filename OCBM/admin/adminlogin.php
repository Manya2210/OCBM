<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include ('../admin/adminconnection.php');
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `user_tab` WHERE email ='$email' AND  password = '$password'";
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