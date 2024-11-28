<?php
session_start();
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// $login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include ('dbconnection.php');
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `customers` WHERE customer_email ='$email' AND  customer_password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num>0){
        $fetch = mysqli_fetch_assoc($result);
        if($email == $fetch['customer_email'] && $password == $fetch['customer_password']){
          unset($_SESSION['cart']);
          $_SESSION['customer'] = $fetch;

    // if($num == 1){
        header("location: index.php");
        // echo ("Login successfully");
    }
    else{
        echo"
        <script>
        alert('Please Enter Valid Password');
        </script>
        ";
      }}
    else{
        echo"
        <script>
        alert('OOPS..! Failed to login try again with valid credentials');
         window.location.href='register.php';
        </script>
        ";
        
    }
}

?>