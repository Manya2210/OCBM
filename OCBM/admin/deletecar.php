<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = mysqli_connect("localhost", "root", "", "carbuying");

var_dump($_GET);
$id = $_GET['id'];
  
 $sql = "DELETE FROM category WHERE category_id='".$id."'";
//  echo json_encode($sql);
//  die;
if ($mysqli->query($sql) === TRUE) {
    // $result = $mysqli->query("SELECT * FROM category");
    // $rows = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['message' => 'Brand deleted successfully','status' => 1, 'data' => $rows]);
} else {
  echo "Error deleting record: " . $mysqli->error;
}

 
?>