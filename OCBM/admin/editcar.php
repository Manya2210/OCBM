 
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


include 'adminconnection.php';
if(isset($_GET['editid']))
{
$editid = $_GET['editid'];

$sql = "SELECT * FROM `car` WHERE `car`.`car_id` = $editid";
$result = mysqli_query($conn, $sql);
$editdata = mysqli_fetch_array($result);

}
// echo ($editid);
$editid = $_REQUEST['editid'];
//exit;
if(isset($_POST['submit']))
{
        $car_name = $_POST['car_name'];
        $description = $_POST['description'];
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
        $sql = "UPDATE `car` SET `doc` = '$file_name', `car_name` = '$car_name' , `description` = '$description' , `status` = '$status' WHERE `car`.`car_id` = $editid";
        $result = mysqli_query($conn, $sql);
        // echo ($file_name);

        if($result){
           
            // echo "File updated Successfully";
           header('location:car.php');
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
h3{
        text-align: center;
        color: #2b6eff;
    }
    .error{
      color:red;
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <h3 >Edit Record</h3>
  <form action="editcar.php" method="POST" enctype="multipart/form-data" id="editcarvali">
    <input type=hidden name="editid" value="<?php echo $_REQUEST['editid'] ?>">
    <div class="mb-3 mt-3">
         <label for="email">old image</label>
        <img src="../admin/car-images/<?php echo $editdata['doc']; ?>"style="height:100px;">
        <input type="hidden" name="oldimage" value="<?php echo $editdata['doc']; ?>">
      <label for="email">Upload file:</label>
      <input type="file" class="form-control" name="doc" ><br>
     
      <label for="name">name</label>
      <input type="text" class="form-control" name="car_name" value="<?php echo $editdata['car_name']; ?>" ><br>
      <label for="description">description</label>
      <input type="text" class="form-control" name="description"value="<?php echo $editdata['description']; ?>" ><br>
      <label for="status">status</label>
      <input type="text" class="form-control" name="status" value="<?php echo $editdata['status']; ?>" >
     </div>

    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>
    $('document').ready(function () {
      $('#editcarvali').validate({
          rules:{
          
            car_name: 
            {
              required:true
            },
            description: 
            {
              required:true
            },
            status: 
            {
              required:true
            }
          }
             
        })
  
})


</script>

</body>
</html>

