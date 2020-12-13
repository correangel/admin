<?php 
	include "db.php";
	include "include/header.php";
	if(isset($_POST['usuario'])){
		$usuario = $_POST['usuario'];
		$clave = sha1($_POST['clave']);

		$sql = mysqli_query($enlace, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave' AND tipo = '3'");
		$num = mysqli_num_rows($sql);

		if($num > 0){
			$row = mysqli_fetch_array($sql);
			session_start();
			$_SESSION['id'] = $row['id'];
			$_SESSION['tipo'] = $row['tipo'];

			header("Location: inicio.php");
		}
		else{
			$mensaje = "Error al iniciar sesion";
		}
	}
 ?>
<style>
	
	.menu1{
		display: none!important;
	}
</style>
<main>

	<div class="row d-flex align-items-center">
		<div class="col-lg-4 col-12" style="background-color: #495464;height: 100vh;">
			<!-- <img src="img/cohete.svg" class="w-100 vh-100 " alt=""> -->
		</div>
		<div class="col-lg-8 col-12">
			<div class="container">
				<div class="row flex-center">
					<div class="col-lg-8">
						<div class="row d-flex justify-content-center ">
							<div class="col-lg-7 ">
									<form method="post" action=""> 
									<?php
									if(isset($mensaje)){
									?>
									<div class="alert alert-warning my-4" role="alert">
									<?= $mensaje ?>
									</div>
									<?php } ?>

								<h2 class="text-center font-weight-bold my-4 color2">Kineshub | ADMIN</h2>
							<input class="form-control my-2" type="text" placeholder="Usuario" name="usuario">
							<input class="form-control my-2" type="password" placeholder="Contraseña" name="clave">
							<div class="text-center mt-4">
								<button class="btn boton2 font-weight-bolder">Iniciar Sesión</button>
							</div>
								
							</form>
							</div>
						</div>
					
					</div>
				</div>
					
			</div>
		
		</div>
	</div>
</main>
 <?php 
	include "include/footer.php"
 ?>