<?php include_once('header.php');?> 
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>	

<!doctype html>
<html>
    <head>
        
        <?php
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        include("adminconnection.php");
     
        if(isset($_POST['but_upload'])){
            $maxsize = 5242880; // 5MB
                       
            $name = $_FILES['file']['name'];
            $target_dir = "../admin/videos/";
            $target_file = $target_dir . $_FILES["file"]["name"];

            // Select file type
            $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

            // Check extension
            if( in_array($videoFileType,$extensions_arr) ){
                
                // Check file size
                if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        // Insert record
                        $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

                        mysqli_query($con,$query);
                        echo "Upload successfully.";
                    }
                }

            }else{
                echo "Invalid file extension.";
            }
        
        }
        ?>
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
        </style>
    </head>
    <body>
        <h3>
            Banner image 
        </h3>
        <div>
            <button class="cart-button" id="openModal">
              Add image
              </button>
        </div>



        <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="" enctype='multipart/form-data'>
            <input type='file' name='file' /><br><br>
            <input type='submit' value='Upload' name='but_upload' class="btn btn-sm btn-primary">
        </form>
      </div>
      
    </div>
  </div>
</div>






<script>
    $(document).ready(function(){
    $('#openModal').click(function () {
        $('#exampleModal').modal('toggle');
    });
    $('.close').click(function () {
        $('#exampleModal').modal('hide');
    });
})

</script>
       
 
<script>
      $("#myTable").DataTable({
        "pageLength": 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
      });
      </script>
    </body>
</html>
