


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'adminconnection.php';

$data = json_decode(file_get_contents('php://input'), true);
 
//  echo json_encode($data);
//  die;

 $category_id = $data['category_id'];
 $category_brand = $data['category_brand'];
 $image = $_FILES['category_image']['name'];
 $target_path = "car-images/";
 $target = $target_path.basename($image);

move_uploaded_file($_FILES['category_image']['tmp_name'], $target);
var_dump($image);
//  var_dump($category_brand);
//  if(!empty($category_id)){
   
    // $sql = "UPDATE `category` SET `category_brand` = $category_brand WHERE `category_id` = $category_id ";
    $sql = "UPDATE category SET category_brand='".$category_brand."', category_image='".$target."' WHERE category_id='".$category_id."'";
    
    if (mysqli_query($conn, $sql)) {
     echo "Brand model Updated successfully";
     } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
//  }

?>

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// // Get other form data
// $category_id = $_POST['category_id'];
// $category_brand = $_POST['category_brand'];
// var_dump($category_brand);
// // Handle image upload
// $image2 = $_FILES['category_image']['name'];
// $target_path2 = "car-images/";
// $target2 = $target_path2.basename($image2);

// move_uploaded_file($_FILES['category_image']['tmp_name'], $target2);

// // Insert data into database
// include 'adminconnection.php';

// $sql = "UPDATE category SET category_brand='".$category_brand."', category_image='".$image2."' WHERE category_id='".$category_id."'";
// $conn->query($sql);
// $conn->close();
?>