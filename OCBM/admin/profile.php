<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create connection
include ('adminconnection.php');
$sql = "SELECT * FROM admin_detail";
$result = $conn->query($sql);
$rows=$result->fetch_assoc();


// var_dump($rows);
// exit();

$sql1 = "SELECT * FROM adminimage";
$result1 = $conn->query($sql1);
$rows1=$result1->fetch_assoc();                         
                    

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['uploadfile'])) {
    $file_name = $_FILES['uploadfile']['name'];
    $file_tmp = $_FILES['uploadfile']['tmp_name'];
    $file_type = $_FILES['uploadfile']['type'];
    $file_size = $_FILES['uploadfile']['size'];
    // Specify a directory to store uploaded files
    $upload_dir = '../admin/adminimage/';
    $target_file = $upload_dir . $file_name;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($file_tmp, $target_file)) {
        // File upload successful, perform database operations here
        $sql = "INSERT INTO `adminimage` (`doc`) VALUES ('$file_name')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo"
            <script>
            alert('Image uploaded Successfully');
            window.location.href='profile.php';
            </script>
         ";
        }else{
            echo "Error on Insert query";
        }
    } 
}

if(isset($_POST['submit1']))
{
    if(isset($_POST['snoEdit'])){
        $sno = $_POST["snoEdit"];
              
          $file_name = $_FILES['doc']['name'];
          $tempname = $_FILES['doc']['tmp_name'];
          $folder = '../admin/adminimage/'.$file_name;
          move_uploaded_file($tempname, $folder);
      

            // echo ($editid);
            // $sql = "UPDATE `adminimage` SET `doc` = '$file_name' WHERE `adminimage`.`sno` = $sno";
            $sql = "UPDATE `adminimage` SET `doc`='$file_name' WHERE `adminimage`.`sno` = '$sno'";
            $result = mysqli_query($conn, $sql);
            // echo ($file_name);
    
            if($result){
               
                // echo "File updated Successfully";
            //    header('location:car.php');
            echo"
            <script>
            alert('Image change Successfully');
            window.location.href='profile.php';
            </script>
         ";
            }
            else{
                echo "File not updated";
            }
}
    

}






if(isset($_POST['submit']))
{
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['idEdit'])){
      $id = $_POST["idEdit"];
      $username = $_POST["usernameEdit"];
      $first_name = $_POST["first_nameEdit"];
      $last_name = $_POST["last_nameEdit"];
      $email = $_POST["emailEdit"];
      $phone = $_POST["phoneEdit"];
      $birthday = $_POST["birthdayEdit"];
    //  var_dump($id);
      $sql = "UPDATE `admin_detail` SET `username`='$username',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`birthday`='$birthday' WHERE `admin_detail`.`id` = '$id'";
      $result = mysqli_query($conn, $sql);
      if($result){
       echo"
          <script>
          alert('Profile Updated Successfully');
          window.location.href='profile.php';
          </script>
       ";
      }
      else{
        echo "Profile has not updated successfully";
      }
    }
}

}
?>		   






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.html" />

	<title>Profile | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 30%;
    margin-left: 1rem;
    margin-right: 1rem;
}
    </style>
    <title>Document</title>
</head>
<body>
                <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- edit image Modal -->
<div class="modal fade" id="imageeditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="profile.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="snoEdit" value="<?php echo $rows1['sno'] ?>">
      <label for="email">Upload file:</label>
      <input type="file" class="form-control" name="doc" >
     
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" name="submit1" class="btn btn-primary">Change image</button>
      </div>
    </form>
    </div>
    </div>
  </div>
</div>


                <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Insert image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="profile.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" id="uploadfile" name="uploadfile" aria-describedby="emailHelp">
            </div>
     
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" name="submit" class="btn btn-primary">Add image</button>
      </div>
    </form>
    </div>
    </div>
  </div>
</div>




<!------------------Admin Detail Modal------------->
<div class="modal fade" id="admin_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="profile.php" method="POST">
                            <!-- Form Group (username)-->
        <input type=hidden name="idEdit" value="<?php echo $rows['id'] ?>">
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" name="usernameEdit" value="<?php echo $rows['username'];?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="first_nameEdit" value="<?php echo $rows['first_name'];?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="last_nameEdit" value="<?php echo $rows['last_name'];?>">
                                </div>
                            </div>
                            <!-- Form Row -->
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="emailEdit" value="<?php echo $rows['email'];?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="phoneEdit" value="<?php echo $rows['phone'];?>">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" placeholder="Enter your birthday" name="birthdayEdit" value="<?php echo $rows['birthday'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" name="submit" class="btn btn-primary" >Save changes</button>
                         </div>
         </form>
      </div>
    </div>
  </div>
</div>





    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                       
                        <img class="img-account-profile rounded-circle mb-2" src="../admin/adminimage/<?php echo $rows1['doc']; ?>" >
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4"><h4>Riya Gupta</h4></div>
                        <!-- Profile picture upload button-->
                        <button hidden class="btn btn-primary" type="submit" id="updateimage">Insert Image</button>
                        <button class="btn btn-primary" type="submit" id="updateimage1">Upload new image</button>
                    </div>
                </div>
            </div>


           
        <!-- Account page navigation-->
       
       
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="profile.php" method="POST">
                            <!-- Form Group (username)-->
                            <!-- <input type=text name="id" value="<?php echo $rows['id'] ?>"> -->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" name="usernameEdit" value="<?php echo $rows['username'];?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="first_nameEdit" value="<?php echo $rows['first_name'];?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="last_nameEdit" value="<?php echo $rows['last_name'];?>">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="emailEdit" value="<?php echo $rows['email'];?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="phoneEdit" value="<?php echo $rows['phone'];?>">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" placeholder="Enter your birthday" name="birthdayEdit" value="<?php echo $rows['birthday'];?>">
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button" id="editdetail">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-8"> -->
                <!-- Change password card-->
                <!-- <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form> -->
                            <!-- Form Group (current password)-->
                            <!-- <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                            </div> -->
                            <!-- Form Group (new password)-->
                            <!-- <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                            </div> -->
                            <!-- Form Group (confirm password)-->
                            <!-- <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                            </div>
                            <button class="btn btn-primary" type="button">Save</button>
                        </form>
                    </div>
                </div> -->
                <!-- Security preferences card-->
               
                
                <!-- Delete account card-->
                <!-- <div class="card mb-4">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                        <button class="btn btn-danger-soft text-danger" type="button">I understand, delete my account</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <script>
    $('document').ready(function () {
    $('#updateimage').click(function () {
        $('#imageModal').modal('toggle');
    });
    $('.close').click(function () {
        $('#imageModal').modal('hide');
    });
    $('#editdetail').click(function () {
        $('#admin_detail_modal').modal('toggle');
    });
    $('.close').click(function () {
        $('#admin_detail_modal').modal('hide');
    });
    $('#updateimage1').click(function () {
        $('#imageeditModal').modal('toggle');
    });
    $('.close').click(function () {
        $('#imageeditModal').modal('hide');
    });




    })


</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</body>
</html>