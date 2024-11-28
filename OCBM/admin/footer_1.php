<footer class="footer">
			    <div class="container-fluid">
				   <div class="row">
				       <div class="col-md-6">
					       <nav class="d-flex">
						      <ul class="m-0 p-0">
							     <li><a href="#">Home</a></li>
								  <li><a href="#">company</a></li>
								   <li><a href="#">portfolio</a></li>
								    <li><a href="#">Blogs</a></li>
							  <ul>
						   </nav>
					   </div>
					   
					   <div class="col-md-6">
					       <p class="copyright d-flex justify-content-end">
						      &copy 2021 Design By
						      <a href="#">Vishweb Design</a>Bootstrap Admin  Template
						   </p>
					   </div>
				   </div>
				</div>
			 
			 </footer>
		</div>
</div>



<!----------html code compleate----------->








  
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
        
		$(document).ready(function(){
		  $("#sidebar-collapse").on('click',function(){
			//console.log("Hello");
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".more-button,.body-overlay").on('click',function(){
			//console.log("Hello");
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});
		
</script>
  
  



  </body>
  
  </html>