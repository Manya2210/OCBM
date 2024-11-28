<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = mysqli_connect("localhost", "root", "", "carbuying");

$data = json_decode(file_get_contents('php://input'), true);
 
 $phone= $data['phone'];
 $email= $data['email'];
 $address= $data['address'];
 $sno= $data['sno'];
 if(!empty($sno)){
;
$sql = "UPDATE contact_info SET phone='".$phone."', email='".$email."', address='".$address."' WHERE sno='".$sno."'";
    if (mysqli_query($mysqli, $sql)) {
     echo "Contact Info Updated successfully";
     } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
     };
 }

?>