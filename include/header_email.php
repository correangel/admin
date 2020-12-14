<?php
require_once "api.php";
?>


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
	<title>KinesHub</title>
</head>
<body>
	<header>


<!-- pc  -->

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light menu1x  d-none d-md-block">
<div class="container-fluid">
	 <!-- Basic dropdown -->
<!-- <button class="icomenu1 mr-4 px-3" type="button" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false" id="menudropdown"><i class="fas fa-bars"></i></button>

<div class="dropdown-menu" aria-labelledby="menudropdown">
  <a class="dropdown-item" href="#">Action</a>
  <a class="dropdown-item" href="#">Another action</a>
  <a class="dropdown-item" href="#">Something else here</a>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="logout.php">Cerrar Sesion</a>
</div> -->
<!-- Basic dropdown -->
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="180" alt=""></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto flex-center">
      <li class="nav-item " style="width: 450px;">
        <div class="input-group md-form ml-3 form-sm form-1 pl-0">
 
  <input class="form-control my-0 py-1 buscador1" type="text" placeholder="Buscar <?= $num ?> Anuncios" aria-label="Search" id="buscar_texto" onkeyup="filtrar_busqueda()">
   <div class="input-group-prepend">
    <span class="input-group-text text-dark" id="buscador" style="border-radius: 3px;"><i class="fas fa-search  pr-1"
        aria-hidden="true"></i> Buscar</span>
  </div>
</div>
      </li>
      <li class="nav-item">
        <p class="font-weight-bold ml-5 text-dark">LA MEJOR COMPAÑÍA A SOLO UN CLICK</p>
      </li>
      

     

    </ul>
    <!-- Links -->
  <ul class="navbar-nav ml-auto flex-center">
  	<li class="nav-item">
       <button class="boton7 btn pt-2" data-toggle="modal" data-target="#sesion">Ingresar</button>
      </li>
      <li class="nav-item">
       <button class="boton6 btn pt-2"
       data-toggle="modal" data-target="#Registro">Registro</button>
      </li>

        <!-- data-target="#registrok" modal registro de kine -->
        <!-- data-target="#registrousuario"  modal regsitro de unsuario-->
      

  </ul>
  </div>
  <!-- Collapsible content -->
</div>


</nav>
<!--/.Navbar-->
<!-- fin de pc  -->


























		<!--menu movil-->
<nav class="navbar navbar-light d-block d-md-none d-flex align-items-center" >

  <!-- Collapse button -->
  <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
    aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
    <div class="animated-icon1"><span></span><span></span><span></span></div>
  </button>

  <!-- Navbar brand -->
  <a class="navbar-brand" href="index.php">
  	<div class="text-center ">
  		<div class="row d-flex align-items-start">
  			<div class="col-10 pl-0 pr-3 mx-0">
  				<img src="img/logo.png" width="132" alt="">
  		<p class="f5 font-weight-bolder pb-0 mb-0">LA MEJOR COMPAÑÍA A SOLO UN CLICK</p>
  			</div>
  			<div class="col-2 px-0 mx-0 mt-2">
  				<div class="corazon1 px-1">
  					<i class="fas fa-heart text-danger"></i> 0
  				</div>
  			</div>
  		</div>
  		
  	</div>
  	</a>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent20">

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="iniciodesesion.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
      </li>
      <li class="nav-item ">
      <a href="publicaranuncio.php" class="nav-link"class="nav-link"><i class="fas fa-tag"></i> Publicar Anuncio</a>
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php"><i class="fas fa-address-book"></i> Contacto</a>
      </li>
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.fin de menu movil-->
	</header>
