<?php
include "db.php";

	$id = $_GET['id'];

	$sql = mysqli_query($enlace, "DELETE FROM usuarios WHERE id = '$id'");

	if(!$sql){
		echo "2";
	}
	else{
		echo "1";
	}

?>