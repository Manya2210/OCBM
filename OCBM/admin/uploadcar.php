<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Get other form data
$username = $_POST['category_brand'];
// Handle image upload
$image = $_FILES['category_image']['name'];
$target_path = "car-images/";
$target = $target_path.basename($image);

move_uploaded_file($_FILES['category_image']['tmp_name'], $target);
$status =1;

// Insert data into database
include 'adminconnection.php';

$sql = "INSERT INTO category (category_brand, category_image, category_status) VALUES ('$username', '$target', '$status')";
$conn->query($sql);
$conn->close();
?>