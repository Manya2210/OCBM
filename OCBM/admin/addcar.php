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
// $file_name = $_FILES['category_image']['name'];
// $target_path = "car-images/";
// $target_file = $target_path.basename($_FILES['category_image']['name']);
// $img = 'BMW.png';
// $status = 1;
// if(move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file)){
// var_dump($file_name);
$sql = "INSERT INTO category ( `category_brand`, `category_image`, `category_status` ) 
VALUES ('$category_brand', '$img', '$status')";
$result = mysqli_query($mysqli, $sql);

if($result){
    // chmod("$target_path/$file_name", 0777);
     echo "Data inserted successfully";
 }
 else{
    echo "Data not inserted successfully";
 }



?>


<?php

?>