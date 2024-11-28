<?php include_once('header.php');?>

<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
     <!-- Sidebar  -->


<!--------page-content---------------->


   
   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>	



<?php
 
include('adminconnection.php');
 
?>
<!-- HTML code to display data in tabular format -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    h3{
        text-align: center;
        color: #2b6eff;
    }
    </style>
</head>
 
<body>
        <h3>Customer Data</h3>
<div class="container my-4">

<table class="table" id="myTable">
  <thead>
            <tr>
                    <th scope="col">Customer_id</th>
                    <th scope="col">role_id</th>
                    <th scope="col">Customer_name</th>
                    <th scope="col">Customer_phone</th>
                    <th scope="col">Customer_address</th>
                    <th scope="col">Customer_email</th>
                    <th scope="col">Customer_password</th>
                    <th scope="col">Deleted</th>
                    <th scope="col">Created_on</th>
                    <th scope="col">Updated_on</th>
            </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `customers`";
  $result = mysqli_query($conn, $sql);
$customer_id = 0;
while($row = mysqli_fetch_assoc($result)){
$customer_id++;
  echo "<tr>
  <th scope='row'>".$customer_id."</th>
  <td>".$row['role_id']."</td>
  <td>".$row['customer_name']."</td>
  <td>".$row['customer_phone']."</td>
  <td>".$row['customer_address']."</td>
  <td>".$row['customer_email']."</td>
  <td>".$row['customer_password']."</td>
  <td>".$row['deleted']."</td>
  <td>".$row['created_on']."</td>
  <td>".$row['updated_on']."</td>
</tr>";

}
?>
  
  </tbody>
</table>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
  $("#myTable").DataTable({
   
    });

   
</script>
