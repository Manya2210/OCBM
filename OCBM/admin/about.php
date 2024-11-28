<?php include_once('header.php');?> 
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>	

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$insert = false;
$delete = false;
// $warning = false;
//connect to the database

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "carbuying";



// $conn = mysqli_connect($servername,$username, $password, $database);

// if(!$conn){
//   echo ("Sorry we failed to connect: ".mysqli_connect_error());
// }
include 'adminconnection.php';
if(isset($_GET['delid']))
{
$delid = $_GET['delid'];

$sql = "DELETE FROM `about` WHERE `about`.`id` = $delid";
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

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['uploadfile'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $file_name = $_FILES['uploadfile']['name'];
    $file_tmp = $_FILES['uploadfile']['tmp_name'];
    $file_type = $_FILES['uploadfile']['type'];
    $file_size = $_FILES['uploadfile']['size'];
    // Specify a directory to store uploaded files
    $upload_dir = '../admin/aboutimage/';
    $target_file = $upload_dir . $file_name;
     
    // Move the uploaded file to the target directory
    if (move_uploaded_file($file_tmp, $target_file)) {
        $sql = "INSERT INTO `about` (`doc`, `title`, `description`) VALUES ('$file_name', '$title', '$description')";

        $result = mysqli_query($conn, $sql);

        if($result){
            $insert = true;
        }else{
            echo "Error on update query";
        }
    } 
}

 
  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="./assets/css/registration.css">
   
    <style>
.error {color: #FF0000;}
img{
    height:100px;
    width:100px;
}
h3{
        text-align: center;
        color: #2b6eff;
    }
    .cart-button {
  position: relative;
  padding: 10px;
  width: 200px;
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
.error{
  color:red;
}

    
</style>

   
  </head>
  <body>
  <h3>About us</h3>
            <div>
            <button class="cart-button" id="openModal">
              Add Record
              </button>
            </div>

<!-- Modal -->
   
<?php
 if($insert){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Record has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Record has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>


      <div class="modal fade" id="addaboutmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Add Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="about.php" method="POST" enctype="multipart/form-data" id="aboutvali">
          <!-- <input type="hidden" name="idEdit" id="idEdit"> -->
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" id="uploadfile" name="uploadfile" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="description" name="description" rows="1"></textarea>
            </div>
        
            <div class="modal-footer d-block mr-auto">
              <!-- <button type="submit" class="btn btn-secondary " id="close" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary">Add Record</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

      


<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">sno</th>
      <th scope="col">image</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created_on</th>
      <th scope="col">Updated_on</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `about`";
  $result = mysqli_query($conn, $sql);
$id = 0;
while($data = mysqli_fetch_array($result)){
  $id++;

 ?>

<tr>
<td><?Php echo $data['id']; ?></td>
<td><img src="../admin/aboutimage/<?php echo $data['doc']; ?>"style="height:100px;"></td>
<td><?Php echo $data['title']; ?></td>
<td><?Php echo $data['description']; ?></td>
<td><?Php echo $data['created_on']; ?></td>
<td><?Php echo $data['updated_on']; ?></td>
<td><a href="editabout.php?editid=<?php echo $data['id']; ?>">Edit</a>
<a href="about.php?delid=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
</tr>
<?php 
 }
?>
  </tbody>
</table>
</div>
<script>
    $('document').ready(function () {
      $('#aboutvali').validate({
          rules:{
            uploadfile: 
            {
              required:true
            },
            title: 
            {
              required:true
            },
            description: 
            {
              required:true
            }
          }
             
        })
    $('#openModal').click(function () {
        $('#addaboutmodal').modal('toggle');
    });
    $('.close').click(function () {
        $('#addaboutmodal').modal('hide');
    });
})

</script>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    
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
 <!---footer---->

	 
			 