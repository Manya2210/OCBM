<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = mysqli_connect("localhost", "root", "", "carbuying");

$data = json_decode(file_get_contents('php://input'), true);

$phone=$data['phone'];
$email=$data['email'];
$address=$data['address'];


$sql = "INSERT INTO `contact_info` (`phone`, `email`, `address`) VALUES ('$phone', '$email', '$address')";

$result = mysqli_query($mysqli, $sql);

if($result){
     echo "Contact inserted successfully";
 }
 else{
    echo "Contact not inserted successfully";
 }



?>


