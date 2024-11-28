


<?php

// // require_once 'config.php';
$mysqli = new mysqli("localhost", "root", "", "carbuying");



// Set the content type to JSON
header('Content-Type: application/json');
// Handle HTTP methods
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
 case 'GET':


$result = $mysqli->query("SELECT * FROM team");
$rows = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($rows);

 break;
 case 'POST':
 // Create operation (add a new book)
 $data = json_decode(file_get_contents('php://input'), true);
//  echo json_encode($data);
//  die;
 $teamname = $data['teamname'];
 $teamdesc = $data['teamdesc'];
 

//  echo json_encode("in");
//  die;
 $sql = "INSERT INTO team (`teamname`, `teamdesc`) VALUES ('$teamname', '$teamdesc');";
 //print_r($teamdesc);
// echo json_encode($sql);
// die;
if ($mysqli->query($sql) === TRUE) {
    echo json_encode(['message' => 'Team added successfully','status' => 1]);
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

 break;
 case 'PUT':
 // Update operation (edit a book)
 $data = json_decode(file_get_contents('php://input'), true);

//  echo json_encode($data);
//  die;
 $teamname= $data['teamname'];
 $teamdesc = $data['teamdesc'];

 $teamid = $data['teamid'];
 if(!empty($teamid)){

    $sql = "UPDATE team SET teamname='".$teamname."',teamdesc ='".$teamdesc ."'";

// die;
if ($mysqli->query($sql) === TRUE) {
    echo json_encode(['message' => 'Team updated successfully','status' => 1]);
} else {
  echo "Error updating record: " . $mysqli->error;
}
 }else{
 echo json_encode(['message' => 'Team Id is not found!','status' => 'failed']);
 }
 break;
 case 'DELETE':
 // Delete operation (remove a book)
 $id = $_GET['id'];
  
 $sql = "DELETE FROM team WHERE teamid='".$id."'";
//  echo json_encode($sql);
//  die;
if ($mysqli->query($sql) === TRUE) {
    $result = $mysqli->query("SELECT * FROM team");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['message' => 'Team deleted successfully','status' => 1, 'data' => $rows]);
} else {
  echo "Error deleting record: " . $mysqli->error;
}
 
 break;
 default:
 // Invalid method
 http_response_code(405);
 echo json_encode(['error' => 'Method not allowed']);
 break;
}
?>