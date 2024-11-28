 
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


include 'adminconnection.php';
if(isset($_GET['editid']))
{
$editid = $_GET['editid'];

$sql = "SELECT * FROM `detail_car` WHERE `detail_car`.`detail_id` = $editid";
$result = mysqli_query($conn, $sql);
$editdata = mysqli_fetch_array($result);

}
// echo ($editid);
$editid = $_REQUEST['editid'];
//exit;
if(isset($_POST['submit']))
{
        $description = $_POST['description'];
        $mileage = $_POST['mileage'];
        $enginesize = $_POST['enginesize'];
        $gearbox = $_POST['gearbox'];
        $type = $_POST['type'];
        $fuel = $_POST['fuel'];
        $power = $_POST['power'];
        $seat = $_POST['seat'];
        if($_FILES['doc']['name']!="")
        {        
          $file_name = $_FILES['doc']['name'];
          $tempname = $_FILES['doc']['tmp_name'];
          $folder = '../admin/carmodel/'.$file_name;
          move_uploaded_file($tempname, $folder);
        }
        else
        {
               $file_name =$_POST['oldimage'];
        }
        // echo ($editid);
        $sql = "UPDATE `detail_car` SET `doc` = '$file_name', `description` = '$description' , `mileage` = '$mileage', `enginesize` = '$enginesize', `gearbox` = '$gearbox', `type` = '$type', `fuel` = '$fuel', `power` = '$power', `seat` = '$seat' WHERE `detail_car`.`detail_id` = $editid";
        $result = mysqli_query($conn, $sql);
        // echo ($file_name);

        if($result){
           
            // echo "File updated Successfully";
           header('location:detail_car.php');
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
  <form action="editcardetail.php" method="POST" enctype="multipart/form-data" id="detaileditvali">
    <input type=hidden name="editid" value="<?php echo $_REQUEST['editid'] ?>">
    <div class="mb-3 mt-3">
         <label for="email">old image</label>
        <img src="../admin/carmodel/<?php echo $editdata['doc']; ?>"style="height:100px;">
        <input type="hidden" name="oldimage" value="<?php echo $editdata['doc']; ?>">
      <label for="email">Upload file:</label>
      <input type="file" class="form-control" name="doc" >
      <br>
      <label for="description">description</label>
      <input type="text" class="form-control" name="description"value="<?php echo $editdata['description']; ?>" >
      <br>
      <label for="mileage">mileage</label>
      <input type="text" class="form-control" name="mileage" value="<?php echo $editdata['mileage']; ?>" >
      <br>
      <label for="enginesize">enginesize</label>
      <input type="text" class="form-control" name="enginesize" value="<?php echo $editdata['enginesize']; ?>" >
      <br>
      <label for="gearbox">gearbox</label>
      <input type="text" class="form-control" name="gearbox" value="<?php echo $editdata['gearbox']; ?>" >
      <br>
      <label for="type">type</label>
      <input type="text" class="form-control" name="type" value="<?php echo $editdata['type']; ?>" >
      <br>
      <label for="fuel">fuel</label>
      <input type="text" class="form-control" name="fuel" value="<?php echo $editdata['fuel']; ?>" >
      <br>
      <label for="power">power</label>
      <input type="text" class="form-control" name="power" value="<?php echo $editdata['power']; ?>" >
      <br>
      <label for="seat">seat</label>
      <input type="text" class="form-control" name="seat" value="<?php echo $editdata['seat']; ?>" >
     </div>

    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script>
    $('document').ready(function () {
      $('#detaileditvali').validate({
          rules:{
          
            description: 
            {
              required:true
            },
            mileage: 
            {
              required:true
            },
            enginesize: 
            {
              required:true
            },
            gearbox: 
            {
              required:true
            },
            type: 
            {
              required:true
            },
            fuel: 
            {
              required:true
            },
            power: 
            {
              required:true
            },
            seat: 
            {
              required:true
            },
          }
             
        })
  
})


</script>

</body>
</html>

