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

include('adminconnection.php');
$sql = " SELECT * FROM messages ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
        <h3 style="text-align:center; color:#3982f7; margin:5px; margin-bottom:54px">Inquiries Message</h3>
      
            <table class="table" id="myinq">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Created_on</th>
                    <th scope="col">Updated_on</th>
                   
                    </tr>
                </thead>
            <?php 
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['phone'];?></td>
                    <td><?php echo $rows['subject'];?></td>
                    <td><?php echo $rows['message'];?></td>
                    <td><?php echo $rows['created_on'];?></td>
                    <td><?php echo $rows['updated_on'];?></td>
           

                </tr>
                <?php
                }
                ?>
                </tbody>
        </table>
    </section>
</body>
 
</html>
<script>
  $("#myinq").DataTable({
    "pageLength": 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
    });
</script>
<?php include_once('footer1.php');?>	