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
$update = false;

include 'adminconnection.php';
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `faq` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['snoEdit'])){
    $sno = $_POST["snoEdit"];
    $ques = $_POST["quesEdit"];
    $ans = $_POST["ansEdit"];
    $sql = "UPDATE `faq` SET `ques` = '$ques' , `ans` = '$ans' WHERE `faq`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
     $update = true;
    }
    else{
      echo "FAQ has not updated successfully";
    }
  }
  
  else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ques = $_POST["ques"];
    $ans = $_POST["ans"];
    $sql = "INSERT INTO `faq` (`ques`, `ans`) VALUES ('$ques', '$ans')";
    
    $result = mysqli_query($conn, $sql);
    if($result){
      $insert = true;
    }
    else{
      echo "FAQ has not added successfully " .mysqli_error($conn);
    }
  }
}
}
// }
// }
  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="./assets/css/registration.css">
    <style>
.error {color: #FF0000;}
h3{
        text-align: center;
        color: #2b6eff;
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
</style>

   
  </head>
  <body>
  <h3>FAQ</h3>
            <div>
                    <button class="cart-button" id="openModal">
                  Add FAQ
                    </button>
            </div>

<!-- Modal -->
<div class="modal fade" id="editfaqmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit FAQ</h5>
        <button type="button" class="close" id="closebtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="faq.php" method="POST" id="faq1">
          <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="ques">ques</label>
              <input type="text" class="form-control" id="quesEdit" name="quesEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="ans">Answer</label>
                <textarea class="form-control" id="ansEdit" name="ansEdit" rows="3"></textarea>
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
  <strong>Success!</strong> FAQ has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> FAQ has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($update){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> FAQ has been Updated successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<!-- Modal -->
<div class="modal fade" id="addfaqmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit FAQ</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="faq.php" method="POST" id="faq">
            <div class="form-group">
              <label for="ques"> ques</label>
              <input type="text" class="form-control" id="ques" name="ques" aria-describedby="emailHelp">
              <!-- <span class="error">* <?php echo $value_2Err;?></span> -->
            </div>
            <div class="form-group">
                <label for="ans"> Answer</label>
                <textarea class="form-control" id="ans" name="ans" rows="1"></textarea>
                <!-- <span class="error">* <?php echo $value_2Err;?></span> -->
            </div>
            <div class="modal-footer d-block mr-auto">
              <!-- <button type="submit" class="btn btn-secondary" id="closebtn" data-dismiss="modal">Close</button> -->
              <button type="submit" class="btn btn-primary">Add FAQ</button>
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
      <th scope="col">Ques</th>
      <th scope="col">Answer</th>
      <th scope="col">Created_on</th>
      <th scope="col">Updated_on</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `faq`";
  $result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
$sno++;
  echo "<tr>
  <th scope='row'>".$sno."</th>
  <td>".$row['ques']."</td>
  <td>".$row['ans']."</td>
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
    $('document').ready(function () {
      $('#faq').validate({
          rules:{
            ques: 
            {
              required:true
            },
            ans: 
            {
              required:true
            }
          }
             
        })
      $('#faq1').validate({
          rules:{
            quesEdit: 
            {
              required:true
            },
            ansEdit: 
            {
              required:true
            }
          }
             
        })
    $('#openModal').click(function () {
        $('#addfaqmodal').modal('toggle');
    });
    $('.close').click(function () {
        $('#addfaqmodal').modal('hide');
    });
})
$('#closebtn').click(function () {
        $('#editfaqmodal').modal('toggle');
    });

</script>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
  
 
<script>
  edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element)=>{
  element.addEventListener("click", (e)=>{
  console.log("edit", );
  tr = e.target.parentNode.parentNode;
  ques = tr.getElementsByTagName("td")[0].innerText;
  ans = tr.getElementsByTagName("td")[1].innerText;
  quesEdit.value = ques;
  ansEdit.value = ans;
  snoEdit.value = e.target.id;

  $('#editfaqmodal').modal('show');
  // $('#closebtn').modal('hide');
  
})
  })
  deletes = document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element)=>{
  element.addEventListener("click", (e)=>{
  console.log("edit", );
  sno = e.target.id.substr(1);

  if(confirm("Are you sure want to delete this faq!")){
    console.log("yes");
    window.location = `faq.php?delete=${sno}`;
  }
  else{
    console.log("no");
  }
})
  })
</script>

<script>
  $("#myTable").DataTable({
    "pageLength": 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
    });
   
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
 <!---footer---->	 
	 
 </body>
</html>