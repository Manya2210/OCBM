<?php

include 'adminconnection.php';
if(isset($_GET['editid']))
{
$editid = $_GET['editid'];

$sql = "SELECT * FROM `team` WHERE `team`.`id` = $editid";
$result = mysqli_query($conn, $sql);
$editdata = mysqli_fetch_array($result);

}
// echo ($editdata);
$editid = $_REQUEST['editid'];
//exit;
if(isset($_POST['submit']))
{
        if($_FILES['uploadfile']['name']!="")
        {        
          $file_name = $_FILES['uploadfile']['name'];
          $tempname = $_FILES['uploadfile']['tmp_name'];
          $folder = '../admin/teamimage/'.$file_name;
          move_uploaded_file($tempname, $folder);
        }
        else
        {
               $file_name =$_POST['oldimage'];
        }
        // echo ($editid);
        $sql = "UPDATE `team` SET `filename` = '$file_name' WHERE `team`.`id` = '$editid'";
        $result = mysqli_query($conn, $sql);
        // echo ($file_name);

        if($result){

            echo "File updated Successfully";
        //    header('location:team1.php');
        }
        else{
            echo "File not updated";
        }
    }



?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
        <form action="teamedit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="editid" value="<?php echo $_REQUEST['editid'] ?>">
          <div class="mb-3 mt-3">
              <label for="email">old image</label>
              <img src="<?php echo $editdata['uploadfile']; ?>">
              <input type="hidden" name="oldimage" value="<?php echo $editdata['uploadfile']; ?>">
            <label for="email">Upload file:</label>
            <input type="file" class="form-control" name="doc">
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </body>
        </html>