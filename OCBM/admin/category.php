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
$sql = " SELECT * FROM category ";
$result = $conn->query($sql);


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
    .cart-button {
  position: relative;
  padding: 10px;
  width: 100px;
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
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Form Modal -->
<div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <input type="hidden" name="category_id" id="category_id"/>
        Car Name:<input type="text" name="category_brand" id="category_brand" placeholder="Brand Name" required/><br><br>
         <!-- Car image:<input type="file" name="category_image" id="category_image" required/><br><br> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="upload">ADD</button>
        <!-- <input type="submit" class="btn btn-primary" id="upload" value="ADD"> -->
      </form>
      </div>
    </div>
  </div>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <input type="hidden" name="m-category_id" id="m-category_id"/>
        Car Name:<input type="text" name="m-category_brand" id="m-category_brand" placeholder="Brand Name" required/><br><br>
         <!-- Car image:<input type="file" name="category_image" id="category_image" required/><br><br> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="change-brand">Save changes</button>
        <!-- <input type="submit" class="btn btn-primary" id="upload" value="ADD"> -->
      </form>
      </div>
    </div>
  </div>
</div>
    <section>
        <h3>Brand Name</h3>
            <div>
                    <button class="cart-button" id="openModal">
                  Add Car 
                    </button>
            </div>
            <table class="table" id="mycategory">
                <thead>
                    <tr>
                    <th scope="col">Category_id</th>
                    <th scope="col">Category_Brand</th>
                    <th scope="col">Category_image</th>
                    <th scope="col">Category_status</th>
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
                    <td><?php echo $rows['category_id'];?></td>
                    <td><?php echo $rows['category_brand'];?></td>
                    <td><?php echo $rows['category_image'];?></td>
                    <td><?php echo $rows['category_status'];?></td>
                    <td><?php echo $rows['created_on'];?></td>
                    <td><?php echo $rows['updated_on'];?></td>
                    <td><button type="button" class="edit-btn edit_2">Edit</button>
                    <button class="remove" id="delete_1">Remove</button></td>

                </tr>
                </tbody>
                <?php
                }
                ?>
                
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
    $('#openModal').click(function () {
        $('#editModal1').modal('toggle');
    });
    $('.close').click(function () {
        $('#editModal1').modal('hide');
    });

    $("#upload").on('click',function(){

        var category_brand = $("#category_brand").val();

        var data={
          "category_brand":category_brand,
          "type":"new"

        }
      console.log(data);

    $.ajax({
          type:'POST',
          url:'http://localhost/OCBM/admin/addcar.php/',
          dataType:'json',
          cache:false,
          data:JSON.stringify(data),
          success: function(data) {
          
          }
      });

      $('#editModal1').modal('hide');
      $("#category_brand").val('');
    });
    //------------------------------------------------edit-------------------------------------------

    $('.edit_2').click(function () {
        //  console.log("helooooooooooooooooo");
        $('#editModal2').modal('show');
         var category_id = $(this).closest("tr").find("td:eq(0)").text();
         var category_brand = $(this).closest("tr").find("td:eq(1)").text();

         $("#m-category_id").val(category_id);
         $("#m-category_brand").val(category_brand);
      

 
    $(document).on('click', '#change-brand', function () {
                    
                    var text = $('#m-category_id').val();
                    var text1 = $('#m-category_brand').val();
                    
                    // var category_brand = $("m-category_brand").val();
                      if (category_id != "") {
                        var data={
                        "category_id":text,
                        "category_brand":text1,
                        
                        }
                        console.log(data);
                        $.ajax({
                                url: "http://localhost/OCBM/admin/updatecar.php/",
                                type: "put",
                                data: JSON.stringify(data),
                                contentType: "application/json",
                                success: function(data) {
                                },
                            });
                        
                        $('#editModal2').modal('hide');
                    }
                });
             
            });
    $('.close').click(function () {
        $('#editModal2').modal('hide');
    });

//==========================delete===========================

$(document).on("click", ".remove", function () {
                var category_id = $(this).closest("tr").find("td:eq(0)").text();
                var data={
                        "category_id":category_id,
                        
                        }
                        console.log(data.category_id);
                        $.ajax({
                            url: "http://localhost/OCBM/admin/deletecar.php?id="+data.category_id,
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