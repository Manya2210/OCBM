<?php include_once('header.php');?> 
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>	

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$insert = false;
$delete = false;


include 'adminconnection.php';

if(isset($_GET['delid']))
{
$delid = $_GET['delid'];

$sql = "DELETE FROM `team` WHERE `team`.`id` = $delid";
$result = mysqli_query($conn, $sql);
if($result)
{
    // echo "Deleted";
    $delete = true;
}
else{
    echo " not Deleted";
}
}
if(isset($_POST['submit'])){
  $position = $_POST['position'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $file_name = $_FILES['doc']['name'];
  $tempname = $_FILES['doc']['tmp_name'];
  $folder = '../admin/teamimage/'.$file_name;
  move_uploaded_file($tempname, $folder);


  $sql = "Insert into team (doc, position, name, description) values ('$file_name', '$position', '$name', '$description')";
  $result = mysqli_query($conn, $sql);

  if($result){
    $insert = true;
      // echo "File uploaded Successfully";
     
      
  }
  else{
      echo "File not uploaded";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>All image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="./assets/css/registration.css">
    
    <style>
      h3{
        text-align: center;
        color: #2b6eff;
    }
    .error{
      color:red;
    }
    .cart-button {
  position: relative;
  padding: 10px;
  width: 150px;
  height: 50px;
  margin:12px;
  border: 0;
  border-radius: 10px;
  background-color:#6895f7;
  outline: none;
  cursor: pointer;
  color: #fff;
}
.cart-button:hover {
  background-color:#8bc0fc;
}
td a{
  padding: 5px;
  background-color: #639af2;
  color: white;
  border-radius: 5px;
}
td a :hover{
  padding: 5px;
  background-color: green;
  color: white;
}
    </style>
   
</head>
<body>

<div class="container mt-3">
  <h3>Our team</h3>
  <?php
 if($insert){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Team Member has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Team Member has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>

            <div>
                    <button class="cart-button" id="openModal">
                  Add Member
                    </button>
            </div>
 
<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">image</th>
      <th scope="col">position</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
     
     $sql = "SELECT * FROM `team`";
     $result = mysqli_query($conn, $sql);
     $id = 0;
     while($data = mysqli_fetch_array($result))
     {
      $id++;

     ?>
 
<tr>
 <td><?Php echo $data['id']; ?></td>
 <td><img src="../admin/teamimage/<?php echo $data['doc']; ?>"style="height:100px;"></td>
 <td><?Php echo $data['position']; ?></td>
 <td><?Php echo $data['name']; ?></td>
 <td><?Php echo $data['description']; ?></td>
 <td><a href="edit.php?editid=<?php echo $data['id']; ?>">Edit</a>&nbsp;
<a href="team1.php?delid=<?php echo $data['id']; ?>" class='delete btn btn-sm btn-danger'>Delete</a></td>
</tr>
<?php 
     }
?>
  </tbody>
</table>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image upload</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data" id="teamvali">
     
      <div class="form-group">
          <label for="email">Upload file:</label>
          <input type="file" class="form-control" name="doc">
      </div>
      <div class="form-group">
              <label for="position">position</label>
              <input type="text" class="form-control" id="position" name="position" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="name">name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="description">description</label>
              <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp">
      </div>
  
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
     </form>
      </div>
    </div>
  </div>
    </div>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script>
      $(document).ready(function(){
        $('#teamvali').validate({
          rules:{
            doc: 
            {
              required:true
            },
            position: 
            {
              required:true
            },
            name: 
            {
              required:true
            },
            description: 
            {
              required:true
            }
          }
          
        })
        $('#openModal').click(function(){
          $('#exampleModal').modal('toggle');
          
        });
        $('.close').click(function () {
          $('#exampleModal').modal('hide');
        });
        
      });
      
    </script>

<script>
  $("#myTable").DataTable({
    "pageLength": 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
  });
  
  
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

</body>
</html>

