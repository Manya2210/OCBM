<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = mysqli_connect("localhost", "root", "", "carbuying");

$data = json_decode(file_get_contents('php://input'), true);
 
//  echo json_encode($data);
//  die;
 
 $category_brand = $data['category_brand'];
 $category_id= $data['category_id'];
 if(!empty($category_id)){
   
    // $sql = "UPDATE `category` SET `category_brand` = $category_brand WHERE `category_id` = $category_id ";
$sql = "UPDATE category SET category_brand='".$category_brand."' WHERE category_id='".$category_id."'";
    if (mysqli_query($mysqli, $sql)) {
     echo "Brand Updated successfully";
     } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
     };
 }

?>