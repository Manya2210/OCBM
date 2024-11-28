<?php
   session_start();
include 'dbconnection.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
    //   echo"done";\
            $query1 = "INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES ('$_POST[fullname]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";
        if(mysqli_query($conn, $query1))
        {
            // echo"done";
            $Order_Id=mysqli_insert_id($conn);
            $query2= "INSERT INTO `user_orders`(`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($conn, $query2);
            if($stmt)
            {
               mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Item_Name,$Price,$Quantity);
               foreach($_SESSION['cart'] as $key => $values)
               {
                 $Item_Name = $values['Item_Name'];
                 $Price = $values['Price'];
                 $Quantity = $values['Quantity'];
                 mysqli_stmt_execute($stmt);
               }
               unset($_session['cart']);
               echo"<script>
                alert('Order Placed');
                window.location.href='index.php';
                </script>";
            }
            else
            {
                echo"<script>
                alert('SQL Query Prepare  Error');
                window.location.href='cart.php';
                </script>";
            }
        }
        else
        {
            echo"<script>
            alert('SQL Error');
            window.location.href='cart.php';
            </script>";
        }
    }
}



?>