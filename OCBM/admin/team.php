 <?php include_once('header.php');?> 
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>	

<?php
$insert = false;
$delete = false;
$update = false;
// $warning = false;
//connect to the database

$servername = "localhost";
$username = "root";
$password = "";
$database = "carbuying";



$conn = mysqli_connect($servername,$username, $password, $database);

if(!$conn){
  echo ("Sorry we failed to connect: ".mysqli_connect_error());
}
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `team` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['snoEdit'])){
    $sno = $_POST["snoEdit"];
    $name = $_POST["nameEdit"];
    $description = $_POST["descriptionEdit"];
    $sql = "UPDATE `team` SET `name` = '$name' , `description` = '$description'  WHERE `team`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
     $update = true;
    }
    else{
      echo "Team has not updated successfully";
    }
  }
  $nameErr = $descErr = "";
  $name = $description = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"] && $_POST["description"] )) {
      $nameErr = "name is required";
      $descErr = "Description is required";
    }
  else{
    $name = $_POST["name"];
    $description = $_POST["description"];
    $sql = "INSERT INTO `team` (`name`, `description`) VALUES ('$name', '$description')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $insert = true;
    }
    else{
      echo "Team has not added successfully " .mysqli_error($conn);
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
   
    <style>
.error {color: #FF0000;}
</style>

   
  </head>
  <body>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="team.php" method="POST">
          <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
              </div>
          </div>
            <div class="modal-footer d-block mr-auto">
              <button type="submit" class="btn btn-secondary" id="closebtn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
    </div>
  </div>
</div>

   
<?php
 if($insert){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Team has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Team has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($update){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Team has been Updated successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>

      <div class="container my-4">
        <h2 style="text-align: center; color:#0d6efd">Our Team</h2>
        <form action="team.php" method="POST">
            <div class="form-group">
              <label for="name"> Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
              <span class="error">* <?php echo $nameErr;?></span>
            </div>
            <div class="form-group">
                <label for="desc"> Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                <span class="error">* <?php echo $descErr;?></span>
              </div>
            <button type="submit" class="btn btn-primary">Add Member</button>
          </form>
      </div>
<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">sno</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Created_on</th>
      <th scope="col">Updated_on</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `team`";
  $result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
$sno++;
  echo "<tr>
  <th scope='row'>".$sno."</th>
  <td>".$row['name']."</td>
  <td>".$row['description']."</td>
  <td>".$row['created_on']."</td>
  <td>".$row['updated_on']."</td>
  <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
</tr>";

}
?>
  
  </tbody>
</table>
</div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
 
<script>
  edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element)=>{
  element.addEventListener("click", (e)=>{
  console.log("edit", );
  tr = e.target.parentNode.parentNode;
  name = tr.getElementsByTagName("td")[0].innerText;
  description = tr.getElementsByTagName("td")[1].innerText;
  nameEdit.value = name;
  descriptionEdit.value = description;
  snoEdit.value = e.target.id;

  $('#editModal').modal('show');
  $('#closebtn').modal('hide');
  
})
  })
  deletes = document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element)=>{
  element.addEventListener("click", (e)=>{
  console.log("edit", );
  sno = e.target.id.substr(1);

  if(confirm("Are you sure want to delete this note!")){
    console.log("yes");
    window.location = `team.php?delete=${sno}`;
  }
  else{
    console.log("no");
  }
})
  })
</script>
  </body>
</html>
<script>
  $("#myTable").DataTable({
    "pageLength": 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
    });

   
</script>
			 
 <!---footer---->
  <?php include_once('footer.php');?>			 
	 
			 