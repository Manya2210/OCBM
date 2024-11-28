<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Get other form data

$sub_category_subbrand=$_POST['sub_category_subbrand'];
// Handle image upload
$fileimage = $_FILES['sub_category_image']['name'];
$target_path1 = "carmodel/";
$targett = $target_path1.basename($fileimage);
move_uploaded_file($_FILES['sub_category_image']['tmp_name'], $targett);


$year=$_POST['year'];

$color=$_POST['color'];

$price=$_POST['price'];

$status =1;

// Insert data into database
$conn = new mysqli("localhost", "root", "", "carbuying");

$sql = "INSERT INTO `sub_category` (`category_id`, `sub_category_subbrand`, `sub_category_image`, `year`, `color`, `price`, `sub_category_status`) VALUES ('250', '$sub_category_subbrand', '$targett', '$year', '$color', '$price', '$status')";
$conn->query($sql);
$conn->close();
  
?>