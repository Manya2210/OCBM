<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('adminconnection.php');
// case 'POST':
    // var_dump($data);
 $data = json_decode(file_get_contents('php://input'), true);
//  var_dump($_POST);
var_dump($data);
$sub_category_subbrand=$data['sub_category_subbrand'];
// var_dump($sub_category_subbrand);
$sub_category_image=$data['sub_category_image'];
// var_dump($sub_category_image);
$year=$data['year'];
// var_dump($year);
$color=$data['color'];
// var_dump($color);
$price=$data['price'];
// var_dump($price);
$status= 1;

    // $sql = "INSERT INTO sub_category (`category_id``sub_category_subbrand`, `sub_category_image`, `year`, `color`, `price`, `sub_category_status`) VALUES ('2', '$sub_category_subbrand', '$sub_category_image', '$year', '$color', '$price', '$status')";
    $sql= "INSERT INTO `sub_category` (`category_id`, `sub_category_subbrand`, `sub_category_image`, `year`, `color`, `price`, `sub_category_status`) VALUES ('2', '$sub_category_subbrand', '$sub_category_image', '$year', '$color', '$price ', '0')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    // break;


?>