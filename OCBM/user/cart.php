<?php
session_start();
if (!isset($_SESSION['customer'])) {
  header("Location: register.php"); // Redirect to the login page
  exit();
}
?>
<?php
if(isset($_POST['submit'])){
  header('location:seemodel.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Cart</title>
  <style>
    a{
      margin:20px;
    }
    h1{
      background-color:#f7a08b;
    }
  </style>
</head>
<body>
  <a href="seemodel.php" class="btn btn-sm btn-primary">Back</a>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center border rounded bg-light">
        <h1>My Cart</h1>
      </div>
      
        
      
      <div class="col-lg-8 my-5">
      <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item_Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php
      
      if(isset($_SESSION['cart']))
       {
      
       foreach($_SESSION['cart'] as $key => $value)
       {
        
        $sr = $key+1;
        // print_r($value);
        echo "
        <tr>
        <td>$sr</td>
        <td>$value[Item_Name]</td>
        <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
        <td>
        <form action='manage_cart.php' method='POST'>
        <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
        </form>
        </td>
        <td class ='itotal'></td>
        <td>
        <form action='manage_cart.php' method='POST'>
  
        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove</button>
        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
         </form>
        </td>
        ";
       }
     }
?>


  </tbody>
</table>
      </div>


  <div class="col-lg-4">
    <div class="border br-light rounded p-4">
        <h4>Grand Total:</h4>
        <h5 class="text-right" id="gtotal"></h5>
        <br>
        <?php 
          if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
          {

         
        
        ?>
        <form action="purchase.php" method="POST">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Phone number</label>
          <input type="phone" name="phone_no" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" class="form-control" required>
        </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="exampleRadios1"   value="option1" checked>
              <label class="form-check-label" for="exampleRadios1">
                Cash On Delievry
              </label>
            </div>
            <br>
          <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
        </form>
        <?php   } ?>
    </div>
  </div>

    </div>
  </div>

<script>
     var gt=0;
     var iprice= document.getElementsByClassName('iprice');
     var iquantity= document.getElementsByClassName('iquantity');
     var itotal= document.getElementsByClassName('itotal');
     var gtotal= document.getElementById('gtotal');

     function subTotal()
     {
      gt=0;
        for(i=0;i<iprice.length;i++)
        {
           itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
           gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
     }
     subTotal();
  
</script>






</body>
</html>