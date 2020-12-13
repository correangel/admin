<?php 
session_start();
include "db.php";
if(isset($_SESSION['id']) && $_SESSION['tipo'] == 3){

}
else{
	header("Location: index.php");
}

	include("include/header.php");
 ?>

		
	
	<?php 
	include "include/footer.php"
 ?>
