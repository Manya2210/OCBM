<?php include_once('header.php');?>
<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
		
		<!-------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!-------------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>		   
		   
		   <!--------main-content------------->
<?php include_once('main-content.php');?>		   
		   
			 
			 <!---footer---->
<?php include_once('footer1.php');?>			 
	 