<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilo.css">
	<title>Document</title>
</head>
<body>
	<header>
		
			<!--Navbar-->
<nav class="navbar navbar-expand-lg  menu1">
	<div class="container-fluid">
		<!-- Navbar brand -->
  <a class="navbar-brand" href="#"><h2 class="font-weight-bold color1" style="font-size: 2rem;">Kineshub | ADMIN</h2></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
      
     
      <li class="nav-item ">
        <a class="nav-link color1" href="logout.php"><i class="fas fa-power-off "></i>
        </a>
      </li>
      

     

    </ul>
    <!-- Links -->

	</div>

  

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
		
	
	</header>

  <main>
		
		<div class="d-flex">
		<div id="siderbar-container" class="fondo1">
		<!-- 	<div class="logo">
				<h4 class="text-white font-weight-bold" style="font-size: 2rem;">Logo</h4>
			</div> -->
			<div class="menu text-center">
				<a href="#" class="d-block color1 p-3"><i class="fas fa-home mr-2 fa-2x"></i></a>
				<a href="usuarios.php" class="d-block color1 p-3"><i class="fas fa-users mr-2 fa-2x"></i> </a>
				<a href="soporte.php" class="d-block color1 p-3"><i class="fas fa-exclamation-circle mr-2 fa-2x"></i></a>
				<a href="promociones.php" class="d-block color1 p-3"><i class="fas fa-gifts fa-2x mr-2" ></i></a>
				<a href="#" class="d-block color1 p-3"><i class="fas fa-cloud  fa-2x mr-2"></i></a>
				<a href="#" class="d-block color1 p-3"><i class="fas fa-portrait  fa-2x mr-2"></i></a>
				<?php
				if($_SESSION['tipo'] == 4){
					?>
				<a href="#" class="d-block color1 p-3"><i class="fas fa-cogs fa-2x mr-2"></i></a>
				<a href="#" class="d-block color1 p-3"><i class="fas fa-user-cog fa-2x mr-2"></i></a>
				<?php } ?>
			</div>
		</div>