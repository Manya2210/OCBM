<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = mysqli_connect("localhost", "root", "", "carbuying");
// var_dump($_POST);
$data = json_decode(file_get_contents('php://input'), true);
//   var_dump($data);
$category_brand=$data['category_brand'];
// var_dump($category_brand);
// $image = $_FILES['category_image']['name'];
// $temp_name = $_FILES['category_image']['tmp_name'];
// $folder = '../car-images'.$image;
$img = 'BMW.png';
$status = 1;

// var_dump($category_brand);
  
// chmod($folder, 0755);
// move_uploaded_file($temp_name, $folder);

$sql = "INSERT INTO category ( `category_brand`, `category_image`, `category_status` ) VALUES ('$category_brand', '$img', '$status')";
//   $result = mysqli_query($conn, $sql);


if (mysqli_query($mysqli, $sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
};

 



 
?>