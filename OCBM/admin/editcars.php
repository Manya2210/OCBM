 
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


include 'adminconnection.php';
if(isset($_GET['editid']))
{
$editid = $_GET['editid'];

$sql = "SELECT * FROM `cars` WHERE `cars`.`id` = $editid";
$result = mysqli_query($conn, $sql);
$editdata = mysqli_fetch_array($result);

}
// echo ($editid);
$editid = $_REQUEST['editid'];
//exit;
if(isset($_POST['submit']))
{
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $mileage = $_POST['mileage'];
        $enginesize = $_POST['enginesize'];
        $gearbox = $_POST['gearbox'];
        $status = $_POST['status'];
        if($_FILES['doc']['name']!="")
        {        
          $file_name = $_FILES['doc']['name'];
          $tempname = $_FILES['doc']['tmp_name'];
          $folder = '../admin/car-images/'.$file_name;
          move_uploaded_file($tempname, $folder);
        }
        else
        {
               $file_name =$_POST['oldimage'];
        }
        // echo ($editid);
        $sql = "UPDATE `cars` SET `doc` = '$file_name', `name` = '$name' , `price` = '$price' ,  `description` = '$description' , `mileage` = '$mileage' , `enginesize` = '$enginesize' , `gearbox` = '$gearbox' , `status` = '$status' WHERE `cars`.`id` = $editid";
        $result = mysqli_query($conn, $sql);
        // echo ($file_name);

        if($result){
           
            // echo "File updated Successfully";
           header('location:cars.php');
        }
        else{
            echo "File not updated";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>image upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
h3{
        text-align: center;
        color: #2b6eff;
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <h3 >Edit Record</h3>
  <form action="editcars.php" method="POST" enctype="multipart/form-data">
    <input type=hidden name="editid" value="<?php echo $_REQUEST['editid'] ?>">
    <div class="mb-3 mt-3">
         <label for="email">old image</label>
        <img src="../admin/car-images/<?php echo $editdata['doc']; ?>"style="height:100px;">
        <input type="hidden" name="oldimage" value="<?php echo $editdata['doc']; ?>">
      <label for="email">Upload file:</label>
      <input type="file" class="form-control" name="doc" >
     
      <label for="name">name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $editdata['name']; ?>" >
      <label for="price">price</label>
      <input type="text" class="form-control" name="price" value="<?php echo $editdata['price']; ?>" >
      <label for="description">description</label>
      <input type="text" class="form-control" name="description"value="<?php echo $editdata['description']; ?>" >
      <label for="mileage">mileage</label>
      <input type="text" class="form-control" name="mileage"value="<?php echo $editdata['mileage']; ?>" >
      <label for="enginesize">enginesize</label>
      <input type="text" class="form-control" name="enginesize"value="<?php echo $editdata['enginesize']; ?>" >
      <label for="gearbox">gearbox</label>
      <input type="text" class="form-control" name="gearbox"value="<?php echo $editdata['gearbox']; ?>" >
      <label for="status">status</label>
      <input type="text" class="form-control" name="status" value="<?php echo $editdata['status']; ?>" >
     </div>

    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

