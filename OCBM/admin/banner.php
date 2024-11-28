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
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `banner` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['snoEdit'])){
      $sno = $_POST["snoEdit"];
      $title1 = $_POST["title1Edit"];
      $desc1 = $_POST["desc1Edit"];
      $title2 = $_POST["title2Edit"];
      $desc2 = $_POST["desc2Edit"];
      $title3 = $_POST["title3Edit"];
      $desc3 = $_POST["desc3Edit"];
      $title4 = $_POST["title4Edit"];
      $desc4 = $_POST["desc4Edit"];
      $title5 = $_POST["title5Edit"];
      $desc5 = $_POST["desc5Edit"];
    
      $sql = "UPDATE `banner` SET `title1`='$title1',`desc1`='$desc1',`title2`='$title2',`desc2`='$desc2',`title3`='$title3',`desc3`='$desc3',`title4`='$title4',`desc4`='$desc4',`title5`='$title5',`desc5`='$desc5' WHERE `banner`.`sno` = '$sno'";
      $result = mysqli_query($conn, $sql);
      if($result){
       $update = true;
      }
      else{
        echo "Banner has not updated successfully";
      }
    }
    else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title1 = $_POST["title1"];
        $desc1 = $_POST["desc1"];
        $title2 = $_POST["title2"];
        $desc2 = $_POST["desc2"];
        $title3 = $_POST["title3"];
        $desc3 = $_POST["desc3"];
        $title4 = $_POST["title4"];
        $desc4 = $_POST["desc4"];
        $title5 = $_POST["title5"];
        $desc5 = $_POST["desc5"];
    
      $sql = "INSERT INTO `banner` (`title1`, `desc1`, `title2`, `desc2`, `title3`, `desc3`, `title4`, `desc4`, `title5`, `desc5`) VALUES ('$title1','$desc1', '$title2', '$desc2', '$title3', '$desc3', '$title4', '$desc4', '$title5', '$desc5')";
      $result = mysqli_query($conn,$sql);
          if($result){
              $insert = true;
          }else{
              echo "Error on Insert query";
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
        <h3>Banner</h3>
            <div>
                    <button  class="cart-button" id="openModal">
                  Add Banner Content 
                    </button>
            </div>
           <!-- Modal -->
<div class="modal fade" id="editbannermodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit Contact</h5>
        <button type="button" class="close" id="closebtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="banner.php" method="POST" id="banner1">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <div class="form-group">
              <label for="phone">title1</label>
              <input type="text" class="form-control" id="title1Edit" name="title1Edit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="desc1">desc1</label>
              <input type="text" class="form-control" id="desc1Edit" name="desc1Edit" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <label for="title2">title2</label>
              <input type="text" class="form-control" id="title2Edit" name="title2Edit" aria-describedby="emailHelp">
            </div>
            
          <div class="form-group">
              <label for="desc2">desc2</label>
              <input type="text" class="form-control" id="desc2Edit" name="desc2Edit" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <label for="title3">title3</label>
              <input type="text" class="form-control" id="title3Edit" name="title3Edit" aria-describedby="emailHelp">
            </div>
            
          <div class="form-group">
              <label for="desc3">desc3</label>
              <input type="text" class="form-control" id="desc3Edit" name="desc3Edit" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <label for="title4">title4</label>
              <input type="text" class="form-control" id="title4Edit" name="title4Edit" aria-describedby="emailHelp">
            </div>
            
          <div class="form-group">
              <label for="desc4">desc4</label>
              <input type="text" class="form-control" id="desc4Edit" name="desc4Edit" aria-describedby="emailHelp">
          </div>

          <div class="form-group">
              <label for="title5">title5</label>
              <input type="text" class="form-control" id="title5Edit" name="title5Edit" aria-describedby="emailHelp">
          </div>
        
          <div class="form-group">
              <label for="desc5">desc5</label>
              <input type="text" class="form-control" id="desc5Edit" name="desc5Edit" aria-describedby="emailHelp">
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
  <strong>Success!</strong> Banner has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Banner has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($update){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Banner has been Updated successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>

    <!-- Modal -->


<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">sno</th>
      <th scope="col">Title1</th>
      <th scope="col">Desc1</th>
      <th scope="col">Title2</th>
      <th scope="col">Desc2</th>
      <th scope="col">Title3</th>
      <th scope="col">Desc3</th>
      <th scope="col">Title4</th>
      <th scope="col">Desc4</th>
      <th scope="col">Title5</th>
      <th scope="col">Desc5</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `banner`";
  $result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
$sno++;
  echo "<tr>
  <th scope='row'>".$sno."</th>
  <td>".$row['title1']."</td>
  <td>".$row['desc1']."</td>
  <td>".$row['title2']."</td>
  <td>".$row['desc2']."</td>
  <td>".$row['title3']."</td>
  <td>".$row['desc3']."</td>
  <td>".$row['title4']."</td>
  <td>".$row['desc4']."</td>
  <td>".$row['title5']."</td>
  <td>".$row['desc5']."</td>
  <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button>
  <button class='delete btn btn-sm btn-danger' id=d".$row['sno'].">Delete</button></td>
</tr>";

}
?>
  
  </tbody>
</table>
</div>

<div class="modal fade" id="addbannermodal" tabindex="-1" role="dialog"                 aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="modal-body">
        <form action="banner.php" method="POST" id="banner">
          <!-- <input type="hidden" name="snoEdit" id="snoEdit"> -->
          <div class="form-group">
              <label for="title1">title1</label>
              <input type="text" class="form-control" id="title1" name="title1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="desc1">desc1</label>
              <input type="text" class="form-control" id="desc1" name="desc1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <label for="title2">title2</label>
              <input type="text" class="form-control" id="title2" name="title2" aria-describedby="emailHelp">
            </div>
            
          <div class="form-group">
              <label for="desc2">desc2</label>
              <input type="text" class="form-control" id="desc2" name="desc2" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <label for="title3">title3</label>
              <input type="text" class="form-control" id="title3" name="title3" aria-describedby="emailHelp">
            </div>
            
          <div class="form-group">
              <label for="desc3">desc3</label>
              <input type="text" class="form-control" id="desc3" name="desc3" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <label for="title4">title4</label>
              <input type="text" class="form-control" id="title4" name="title4" aria-describedby="emailHelp">
            </div>
            
          <div class="form-group">
              <label for="desc4">desc4</label>
              <input type="text" class="form-control" id="desc4" name="desc4" aria-describedby="emailHelp">
          </div>
          
          <div class="form-group">
              <label for="title5">title5</label>
              <input type="text" class="form-control" id="title5" name="title5" aria-describedby="emailHelp">
          </div>
        
          <div class="form-group">
              <label for="desc5">desc5</label>
              <input type="text" class="form-control" id="desc5" name="desc5" aria-describedby="emailHelp">
          </div>
          
            <div class="modal-footer d-block mr-auto">
              <!-- <button type="button" class="btn btn-secondary" id="closebtn" data-dismiss="modal">Close</button> -->
              <button type="submit" class="btn btn-primary">Add Data</button>
            </div>
        </form>
    </div>
    </div>
  </div>
</div>
<script>
    $('document').ready(function () {
      $('#banner').validate({
          rules:{
            title1: 
            {
              required:true
            },
            desc1: 
            {
              required:true
            },
            title2: 
            {
              required:true
            },
            desc2: 
            {
              required:true
            },
            title3: 
            {
              required:true
            },
            desc3: 
            {
              required:true
            },
            title4: 
            {
              required:true
            },
            desc4: 
            {
              required:true
            },
            title5: 
            {
              required:true
            },
            desc5: 
            {
              required:true
            }
          }
             
        })
      $('#banner1').validate({
          rules:{
            title1Edit: 
            {
              required:true
            },
            desc1Edit: 
            {
              required:true
            },
            title2Edit: 
            {
              required:true
            },
            desc2Edit: 
            {
              required:true
            },
            title3Edit: 
            {
              required:true
            },
            desc3Edit: 
            {
              required:true
            },
            title4Edit: 
            {
              required:true
            },
            desc4Edit: 
            {
              required:true
            },
            title5Edit: 
            {
              required:true
            },
            desc5Edit: 
            {
              required:true
            }
          }
             
        })
    $('#openModal').click(function () {
        $('#addbannermodal').modal('toggle');
    });
    $('.close').click(function () {
        $('#addbannermodal').modal('hide');
    });
})
$('#closebtn').click(function () {
        $('#editbannermodal').modal('toggle');
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
  title1 = tr.getElementsByTagName("td")[0].innerText;
  desc1 = tr.getElementsByTagName("td")[1].innerText;
  title2 = tr.getElementsByTagName("td")[2].innerText;
  desc2 = tr.getElementsByTagName("td")[3].innerText;
  title3 = tr.getElementsByTagName("td")[4].innerText;
  desc3 = tr.getElementsByTagName("td")[5].innerText;
  title4 = tr.getElementsByTagName("td")[6].innerText;
  desc4 = tr.getElementsByTagName("td")[7].innerText;
  title5 = tr.getElementsByTagName("td")[8].innerText;
  desc5 = tr.getElementsByTagName("td")[9].innerText;
  title1Edit.value = title1;
  desc1Edit.value = desc1;
  title2Edit.value = title2;
  desc2Edit.value = desc2;
  title3Edit.value = title3;
  desc3Edit.value = desc3;
  title4Edit.value = title4;
  desc4Edit.value = desc4;
  title5Edit.value = title5;
  desc5Edit.value = desc5;
  snoEdit.value = e.target.id;

  $('#editbannermodal').modal('show');
  // $('#closebtn').modal('hide');
  
})
  })
  deletes = document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element)=>{
  element.addEventListener("click", (e)=>{
    console.log("edit", );
    sno = e.target.id.substr(1);
    
    if(confirm("Are you sure want to delete this record!")){
      console.log("yes");
      window.location = `banner.php?delete=${sno}`;
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


</body>
</html>
	 