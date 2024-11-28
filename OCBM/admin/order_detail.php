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

include('adminconnection.php');
$sql = " SELECT * FROM order_manager ";
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
        <h3 style="text-align:center; color:#3982f7; margin:5px; margin-bottom:54px">Order_Details</h3>
      
            <table class="table" id="myOrder">
                <thead>
                    <tr>
                    <th scope="col">Order_Id</th>
                    <th scope="col">Customers Name</th>
                    <th scope="col">Phone_No</th>
                    <th scope="col">Address</th>
                    <th scope="col">Pay_Mode</th>
                    <th scope="col" class="text-center">Orders</th>
                    </tr>
                </thead>
            <tbody>
            <?php 
                while($rows=$result->fetch_assoc())
                {
           ?>
                <tr>
                    <td><?php echo $rows['Order_Id'];?></td>
                    <td><?php echo $rows['Full_Name'];?></td>
                    <td><?php echo $rows['Phone_No'];?></td>
                    <td><?php echo $rows['Address'];?></td>
                    <td><?php echo $rows['Pay_Mode'];?></td>
                    <td>
                    <table class="table">
                      <thead>
                        <tr>
                            <th scope="col">Item_Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                         </tr>
                      </thead>
                      <tbody>
                      <?php
                      $order_query= " SELECT * FROM user_orders WHERE Order_Id=$rows[Order_Id] ";
                      $order_result = $conn->query($order_query);
                       //$order_query="SELECT * FROM `user_orders` WHERE 'Order_Id'='$rows[Order_Id]";
                        // $order_result=mysqli_query($conn,$order_query);
                        // while($data=$order_result->fetch_assoc())
                        while($order_fetch=mysqli_fetch_assoc($order_result))
                {?>
                            <tr>
                               <td><?php echo $order_fetch['Item_Name'];?></td>
                               <td><?php echo $order_fetch['Price'];?></td>
                               <td><?php echo $order_fetch['Quantity'];?></td>
                            </tr>
                       <?php
                        }
                        ?>
                      </tbody>
   
                    </td>
                </tr>
              
                </tbody>
       </table>
       <?php
                }
                ?>
    </section>
</body>
 
</html>
<script>
  $("#myOrder").DataTable({
    "pageLength": 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
    });
</script>

<?php include_once('footer1.php');?>	