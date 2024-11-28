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

include('../admin/adminconnection.php');
$sql = " SELECT * FROM sub_category ";
$result = $conn->query($sql);

// $name = $_POST['modelname'];
// $image = $_POST['modelimage'];
// $year = $_POST['modelyear'];
// $color = $_POST['modelcolor'];
// $price = $_POST['modelprice'];

// $sql= "INSERT INTO `sub_category` (`sub_category_subbrand`, `sub_category_image`, `year`, `color`, `price`, `sub_category_status`, `created_on`, `updated_on`) VALUES ('$name', '$image', '$year', '$color', '$price ', '0', current_timestamp(), current_timestamp());";

// $result= mysqli_query($conn, $sql );

    
//     if($result){
//         echo ("Car Added Successfully");
//     }
//     else{
//         echo ("Some Error Occured");
//     }




?>



<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
<style>
    h3{
        text-align: center;
        color: #2b6eff;
    }
    .table{
        /* padding:19px;    */
    }
    .cart-button {
  position: relative;
  padding: 10px;
  width: 150px;
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
  background-color:#70b1fa;
}
 .edit-btn {
            color: black;
            background-color: #437fe7;
        }

        .remove {
            color: black;
        }
.active1{
            background-color: green;
           color: #fff;
        }

        .inactive {
          background-color: red;
            color: #fff;
        } 


</style>
</head>
 
<body>
<div class="modal fade" id="editcarModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <input type="hidden" name="sub_category_id" id="sub_category_id"/>
        Car Model Name:<input type="text" name="sub_category_subbrand" id="sub_category_subbrand" placeholder="Model name" required/><br><br>
         Car Model image:<input type="text" name="sub_category_image" id="sub_category_image" required/><br><br>
         Car Year:<input type="text" name="year" id="year" placeholder="Model Year" required/><br><br>
         Car Color:<input type="text" name="color" id="color" placeholder="Model Color" required/><br><br>
         Car Model Price:<input type="text" name="price" id="price" placeholder="Model Price" required/><br><br>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="uploadcarmodel">ADD</button>
      </div>
    </div>
  </div>
</div>



<!-- edit car model -->
<div class="modal fade" id="editcarmodel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <input type="hidden" name="m-sub_category_id" id="m-sub_category_id"/>
        Car Model Name:<input type="text" name="m-sub_category_subbrand" id="m-sub_category_subbrand" placeholder="Model name" required/><br><br>
         Car Model image:<input type="text" name="m-sub_category_image" id="m-sub_category_image" required/><br><br>
         Car Year:<input type="text" name="m-year" id="m-year" placeholder="Model Year" required/><br><br>
         Car Color:<input type="text" name="m-color" id="m-color" placeholder="Model Color" required/><br><br>
         Car Model Price:<input type="text" name="m-price" id="m-price" placeholder="Model Price" required/><br><br>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="uploadchanges">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <section>
        <h3>Brand Model Name</h3>
            <div>
                    <button class="cart-button" id="openmodelModal">
                  Add Car Model
                    </button>
            </div>
        <!-- <div class="bg-light rounded h-100 p-4"> -->
            <table class="table" id="mycategory">
                <thead>
                    <tr>
                    <th scope="col">Sub_Cate_id</th>
                    <th scope="col">Cate_id</th>
                    <th scope="col">Sub_Cate_Brand</th>
                    <th scope="col">sub_Cate_img</th>
                    <th scope="col">Year</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sub_Cate_Status</th>
                    <th scope="col">Created_on</th>
                    <th scope="col">Updated_on</th>
                    <th scope="col">Action</th>
                   
                    </tr>
                </thead>
            <?php 
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $rows['sub_category_id'];?></td>
                    <td><?php echo $rows['category_id'];?></td>
                    <td><?php echo $rows['sub_category_subbrand'];?></td>
                    <td><?php echo $rows['sub_category_image'];?></td>
                    <td><?php echo $rows['year'];?></td>
                    <td><?php echo $rows['color'];?></td>
                    <td><?php echo $rows['price'];?></td>
                    <td><?php echo $rows['sub_category_status'];?></td>
                    <td><?php echo $rows['created_on'];?></td>
                    <td><?php echo $rows['updated_on'];?></td>
                    <td><button type="button" class="edit-btn opencarmodel1">Edit</button>
                    <button class="remove">Remove</button></td>

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
  $("#mycategory").DataTable({
    "pageLength": 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
    });
</script>
   <script type="text/javascript">
  $('document').ready(function () {
    $('#openmodelModal').click(function () {
        $('#editcarModal1').modal('toggle');
    });
    $('.close').click(function () {
        $('#editcarModal1').modal('hide');
    });
    $("#uploadcarmodel").on('click',function(){

var sub_category_subbrand=$("#sub_category_subbrand").val()
var sub_category_image=$("#sub_category_image").val()
var year=$("#year").val()
var color=$("#color").val()
var price= $("#price").val()

var data={
  "sub_category_subbrand":sub_category_subbrand,
  "sub_category_image":sub_category_image,
  "year":year,
  "color":color,
  "price":price


}

console.log(data)

    $.ajax({
          type:'POST',
          url:'http://localhost/OCBM/admin/addcarmodel.php/',
          dataType:'json',
          cache:false,
          data:JSON.stringify(data),
          success: function(data) {
          
          }
      });
$('#editcarModal1').modal('hide');
$("#sub_category_subbrand").val('');
$("#sub_category_image").val('');
$("#year").val('');
$("#color").val('');
$("#price").val('');

});


  //============================================edit===========================

$('.opencarmodel1').click(function () {
        $('#editcarmodel2').modal('show');
         var sub_category_id = $(this).closest("tr").find("td:eq(0)").text();
         var sub_category_subbrand = $(this).closest("tr").find("td:eq(2)").text();
         var sub_category_image = $(this).closest("tr").find("td:eq(3)").text();
         var year = $(this).closest("tr").find("td:eq(4)").text();
         var color = $(this).closest("tr").find("td:eq(5)").text();
         var price = $(this).closest("tr").find("td:eq(6)").text();

         $("#m-sub_category_id").val(sub_category_id);
         $("#m-sub_category_subbrand").val(sub_category_subbrand);
         $("#m-sub_category_image").val(sub_category_image);
         $("#m-year").val(year);
         $("#m-color").val(color);
         $("#m-price").val(price);
        
    });
    $('.close').click(function () {
        $('#editcarmodel2').modal('hide');
    });

//==========================delete===========================

$(document).on("click", ".remove1", function () {
                var sub_category_id = $(this).closest("tr").find("td:eq(0)").text();
                var data={
                        "sub_category_id":sub_category_id,
                        }
                        console.log(data.sub_category_id);
                        $.ajax({
                            url: "http://localhost/OCBM/admin/deletecarmodel.php?id="+data.sub_category_id,
                            type: "DELETE",
                            data: JSON.stringify(data),
                            contentType: "application/json",
                            success: function(data) {
                            },
                        });
            });






  });















</script>






<?php include_once('footer.php');?>		