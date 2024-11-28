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
include('adminconnection.php');
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['snoEdit'])){
      $sno = $_POST["snoEdit"];
      $name = $_POST["nameEdit"];
      $phone = $_POST["phoneEdit"];
      $email = $_POST["emailEdit"];
      $address = $_POST["addressEdit"];
      
      $sql = "UPDATE `contact_info` SET `name` = '$name', `phone` = '$phone', `email` = '$email', `address` = '$address'  WHERE `contact_info`.`sno` = '$sno'";
      $result = mysqli_query($conn, $sql);
      if($result){
       $update = true;
      }
      else{
        echo "Contact Info has not updated successfully";
      }
    }
    else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $name = $_POST["name"];
      $phone = $_POST["phone"];
      $email = $_POST["email"];
      $address = $_POST["address"];
    
      $sql = "INSERT INTO `contact_info` (`name`, `phone`, `email`, `address`) VALUES ('$name','$phone', '$email', '$address')";
      $result = mysqli_query($conn,$sql);
          if($result){
              $insert = true;
          }else{
              echo "Error on update query";
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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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
</head>
 
<body>
        <h3>Contact</h3>
            <div>
                    <button hidden class="cart-button" id="openModal">
                  Add Contact 
                    </button>
            </div>
           <!-- Modal -->
<div class="modal fade" id="editcontactmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit Contact</h5>
        <button type="button" class="close" id="closebtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="contact_info.php" method="POST" id="contactvali">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <div class="form-group">
              <label for="phone">Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
            </div>
          <div class="form-group">
              <label for="phone">phone</label>
              <input type="text" class="form-control" id="phoneEdit" name="phoneEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="email">email</label>
              <input type="text" class="form-control" id="emailEdit" name="emailEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="address">address</label>
              <input type="text" class="form-control" id="addressEdit" name="addressEdit" aria-describedby="emailHelp">
            </div>
            <div class="modal-footer d-block mr-auto">
              <!-- <button type="button" class="btn btn-secondary" id="closebtn" data-dismiss="modal">Close</button> -->
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
  <strong>Success!</strong> Car has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Car has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($update){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Car has been Updated successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>

    <!-- Modal -->
<div class="modal fade" id="addcontactmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="contact_info.php" method="POST" >
          <!-- <input type="hidden" name="idEdit" id="idEdit"> -->
            <div class="form-group">
              <label for="name">name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="phone">phone</label>
              <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="email">email</label>
              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="address">address</label>
              <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
            </div>
        

            <div class="modal-footer d-block mr-auto">
              <!-- <button type="submit" class="btn btn-secondary " id="close" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary">Add Car</button>
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
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `contact_info`";
  $result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
$sno++;
  echo "<tr>
  <th scope='row'>".$sno."</th>
  <td>".$row['name']."</td>
  <td>".$row['phone']."</td>
  <td>".$row['email']."</td>
  <td>".$row['address']."</td>
  <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button>
</tr>";

}
?>
  
  </tbody>
</table>
</div>

<script>
    $('document').ready(function () {
      $('#contactvali').validate({
          rules:{
            nameEdit: 
            {
              required:true
            },
            phoneEdit: 
            {
              required:true
            },
            emailEdit: 
            {
              required:true
            },
            addressEdit: 
            {
              required:true
            }
          }
        })
    $('#openModal').click(function () {
        $('#addcontactmodal').modal('toggle');
    });
    $('.close').click(function () {
        $('#addcontactmodal').modal('hide');
    });
})
$('#closebtn').click(function () {
        $('#editcontactmodal').modal('toggle');
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
  name = tr.getElementsByTagName("td")[0].innerText;
  phone = tr.getElementsByTagName("td")[1].innerText;
  email = tr.getElementsByTagName("td")[2].innerText;
  address = tr.getElementsByTagName("td")[3].innerText;
  nameEdit.value = name;
  phoneEdit.value = phone;
  emailEdit.value = email;
  addressEdit.value = address;
  snoEdit.value = e.target.id;
  
  $('#editcontactmodal').modal('show');
  // $('#closebtn').modal('hide');
  
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

</body>
</html>
	 