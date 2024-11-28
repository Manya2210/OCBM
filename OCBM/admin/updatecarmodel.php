<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = mysqli_connect("localhost", "root", "", "carbuying");

$data = json_decode(file_get_contents('php://input'), true);
 
//  echo json_encode($data);
//  die;

 $sub_category_subbrand = $data['sub_category_subbrand'];
 $sub_category_image= $data['sub_category_image'];
 $year= $data['year'];
 $color= $data['color'];
 $price= $data['price'];
 $sub_category_id= $data['sub_category_id'];
 if(!empty($sub_category_id)){
   
    // $sql = "UPDATE `category` SET `category_brand` = $category_brand WHERE `category_id` = $category_id ";
$sql = "UPDATE sub_category SET sub_category_subbrand='".$sub_category_subbrand."', sub_category_image='".$sub_category_image."', year='".$year."', color='".$color."', price='".$price."' WHERE sub_category_id='".$sub_category_id."'";
    if (mysqli_query($mysqli, $sql)) {
     echo "Brand model Updated successfully";
     } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
     };
 }

?>s