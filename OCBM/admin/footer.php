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
$update = false;
// $warning = false;
//connect to the database
include 'adminconnection.php';
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `footer` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['snoEdit'])){
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $value_1 = $_POST["value_1Edit"];
    $value_2 = $_POST["value_2Edit"];
    $value_3 = $_POST["value_3Edit"];
    $value_4 = $_POST["value_4Edit"];
    $sql = "UPDATE `footer` SET `title` = '$title' , `value_1` = '$value_1', `value_2`= '$value_2', `value_3` = '$value_3', `value_4` = '$value_4' WHERE `footer`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
     $update = true;
    }
    else{
      echo "Frontend has not updated successfully";
    }
  }
  // $titleErr = $value_1Err = $value_2Err = $value_3Err = $value_4Err ="";
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   if (empty($_POST["title"] && $_POST["value_1"] && $_POST["value_2"] && $_POST["value_3"] && $_POST["value_4"] )) {
  //     $titleErr = "This Field is required";
  //     $value_1Err = "This Field is required";
  //     $value_2Err = "This Field is required";
  //     $value_3Err = "This Field is required";
  //     $value_4Err = "This Field is required";
    
  //     // echo "
  //     // <script>
  //     // alert('please Fill all the fields')
  //     // </script>
  //     // ";
  //   }
  
else {
    $title = $_POST["title"];
    $value_1 = $_POST["value_1"];
    $value_2 = $_POST["value_2"];
    $value_3 = $_POST["value_3"];
    $value_4 = $_POST["value_4"];
    $sql = "INSERT INTO `footer` (`title`, `value_1`, `value_2`, `value_3`, `value_4`) VALUES ('$title', '$value_1', '$value_2', '$value_3', '$value_4')";
    
    $result = mysqli_query($conn, $sql);
    if($result){
      $insert = true;
    }
    else{
      echo "Team has not added successfully " .mysqli_error($conn);
    }
  }
  }
// }

  ?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
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
.edit_2 {
            color: black;
            background-color: #437fe7;
}
.error{
  color:red;
}
</style>

    <title>Hello, world!</title>
  </head>
  <body>
  
  <h3>Frontend</h3>
            <div>
                    <button class="cart-button" id="openModal">
                  Add content 
                    </button>
            </div>
  <!-- <form action="footer2.php" method="POST" id="hello">
  <div class="form-group">
    <label for="address">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
   <br>
  </div>
  <div class="form-group">
    <label for="address">address</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="address">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
<div class="modal fade" id="editfootermodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit Testimonials</h5>
        <button type="button" class="close" id="closebtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="footer.php" method="POST" id="footervali1">
          <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            
            </div>
            <div class="form-group">
              <label for="value_1">value_1</label>
              <input type="text" class="form-control" id="value_1Edit" name="value_1Edit" aria-describedby="emailHelp">
            
            </div>
            <div class="form-group">
              <label for="value_2">value_2</label>
              <input type="text" class="form-control" id="value_2Edit" name="value_2Edit" aria-describedby="emailHelp">
              
            </div>
            <div class="form-group">
              <label for="value_3">value_3</label>
              <input type="text" class="form-control" id="value_3Edit" name="value_3Edit" aria-describedby="emailHelp">
             
            </div>
            <div class="form-group">
              <label for="value_4">value_4</label>
              <input type="text" class="form-control" id="value_4Edit" name="value_4Edit" aria-describedby="emailHelp">
           
            </div>
           
            <div class="modal-footer d-block mr-auto">
              <!-- <button type="submit" class="btn btn-secondary" id="closebtn" data-dismiss="modal">Close</button> -->
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
			
          </form>
	</div>
    </div>
  </div>
</div>
<?php
 if($insert){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong>Frontend has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Frontend has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($update){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Frontend has been Updated successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<div class="modal fade" id="addfootermodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="footer.php" method="POST" id="footervali">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
              
             
            </div>
            <div class="form-group">
                <label for="value_1">Value-1</label>
				<input type="text" class="form-control" id="value_1" name="value_1" aria-describedby="emailHelp">
        
              
              </div>
            <div class="form-group">
                <label for="value_2">Value-2</label>
				<input type="text" class="form-control" id="value_2" name="value_2" aria-describedby="emailHelp">
        

              </div>
            <div class="form-group">
                <label for="value_3">Value-3</label>
				        <input type="text" class="form-control" id="value_3" name="value_3" aria-describedby="emailHelp">
                

              </div>
            <div class="form-group">
                <label for="value_4">Value-4</label>
				        <input type="text" class="form-control" id="value_4" name="value_4" aria-describedby="emailHelp">
         
              </div>
            <button type="submit" class="btn btn-primary">Add Content</button>
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
      <th scope="col">Title</th>
      <th scope="col">value_1</th>
      <th scope="col">value_2</th>
      <th scope="col">value_3</th>
      <th scope="col">value_4</th>
      <th scope="col">Created_on</th>
      <th scope="col">Updated_on</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `footer`";
  $result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
$sno++;
  echo "<tr>
  <th scope='row'>".$sno."</th>
  <td>".$row['title']."</td>
  <td>".$row['value_1']."</td>
  <td>".$row['value_2']."</td>
  <td>".$row['value_3']."</td>
  <td>".$row['value_4']."</td>
  <td>".$row['created_on']."</td>
  <td>".$row['updated_on']."</td>
  <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button>
   <button class='delete btn btn-sm btn-danger' id=d".$row['sno'].">Delete</button></td>
</tr>";

}
?>
  
  </tbody>
</table>
</div>



    <script>
      $(document).ready(function(){
        $('#footervali').validate({
          rules:{
            title: 
            {
              required:true
            },
            value_1: 
            {
              required:true
            },
            value_2: 
            {
              required:true
            },
            value_3: 
            {
              required:true
            },
            value_4: 
            {
              required:true
            }
          }
             
        })
        $('#footervali1').validate({
          rules:{
            titleEdit: 
            {
              required:true
            },
            value_1Edit: 
            {
              required:true
            },
            value_2Edit: 
            {
              required:true
            },
            value_3Edit: 
            {
              required:true
            },
            value_4Edit: 
            {
              required:true
            }
          }
             
        })
        $('#openModal').click(function () {
     $('#addfootermodal').modal('toggle');
 });
 $('.close').click(function () {
     $('#addfootermodal').modal('hide');
 });
      })
      $('#closebtn').click(function () {
     $('#editfootermodal').modal('toggle');
 });
    </script>
    <script>
  edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element)=>{
  element.addEventListener("click", (e)=>{
  console.log("edit", );
  tr = e.target.parentNode.parentNode;
  title = tr.getElementsByTagName("td")[0].innerText;
  value_1 = tr.getElementsByTagName("td")[1].innerText;
  value_2 = tr.getElementsByTagName("td")[2].innerText;
  value_3 = tr.getElementsByTagName("td")[3].innerText;
  value_4 = tr.getElementsByTagName("td")[4].innerText;
  titleEdit.value = title;
  value_1Edit.value = value_1;
  value_2Edit.value = value_2;
  value_3Edit.value = value_3;
  value_4Edit.value = value_4;
  snoEdit.value = e.target.id;

  $('#editfootermodal').modal('show');
  // $('#closebtn').modal('hide');
  
})
  })
  deletes = document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element)=>{
  element.addEventListener("click", (e)=>{
  console.log("edit", );
  sno = e.target.id.substr(1);

  if(confirm("Are you sure want to delete this note!")){
    console.log("yes");
    window.location = `footer.php?delete=${sno}`;
  }
  else{
    console.log("no");
  }
})

  })
</script>

  
  <script>
    $("#myTable").DataTable({
  
      });
  
     
  </script>
      <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  </body>
</html> 


  


