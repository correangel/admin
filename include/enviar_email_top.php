<?php
include "db.php";
$id = $_POST['id_usuario'];

$sql = mysqli_query($enlace, "SELECT * FROM usuarios WHERE id = '$id'");
$row = mysqli_fetch_array($sql);

$tipo = $_POST['tipo_email'];
$mensaje = $_POST['personalizado'];
$correo = $row['correo'];
$usuario = $row['usuario'];

    if($tipo == 1){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "soporte@kineshub.com";
    $to = "$correo";
    $subject = "Kineshub | Necesitamos Contactarnos  Contigo";
    $message = "
    <!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<!-- Font Awesome -->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>
<!-- Google Fonts -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap'>
<!-- Bootstrap core CSS -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' rel='stylesheet'>
<!-- Material Design Bootstrap -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css' rel='stylesheet'>
	<title>Document</title>

</head>
<body>
	<style>
	.color5 {
    color: #FA374B!important;
}
</style>
<main>
	<div class='container mt-2 mt-lg-5' style='position: absolute;left: 50%;'>
		<div class='row  mt-0 pt-lg-5'>
			<div class='col-lg-3 col-8' style='margin-left: 150px;'>
				<img src='img/logo.png' class='w-100' alt=''>

			</div>
		</div>
		
		<div class='row  mt-5'>
			<div class='col-lg-6 col-10 text-center'>
				<h2 class='font-weight-bold h2-responsive'>Hola,</h2>
				<h1 class='font-weight-bold h1-responsive'>$usuario</h1>
			</div>
		</div>
		<!-- <p class=' font-weight-bold' style='margin-left: 250px;'>---</p> -->
		<div class='row mt-2'>
			<div class='col-lg-6 col-10 text-center'>
				<h4 class='font-weight-normal '>Queremos Contactarnos contigo.
</h4>
<p class='my-3 h4-responsive font-weight-bolder h4-responsive' style='font-size: 18px;'>$mensaje</p>
<h5 class='font-weight-bolder'>¡Consigue la mejor compañía en tu zona al alcance de un click!</h5>
<p class='font-weight-bolder mt-4'>Atentamente,</p>
<p class='font-weight-bolder '>Equipo Kineshub.</p>
<p><a href='#' class='text-dark'><u>Kineshub.com</u></a> | <a href='#' class='text-dark'><u>  Terminos y Condiciones</u></a></p>
<p class='font-weight-bolder'>Lima , Perú</p>
<p class='font-weight-bolder'>©2020 Kineshub</p>
			</div>
		</div>
	</div>
</main>
</body>
<!-- JQuery -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<!-- Bootstrap tooltips -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js'></script>
<!-- Bootstrap core JavaScript -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js'></script>
<!-- MDB core JavaScript -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js'></script>
</html>

    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $from;
    echo mail($to,$subject,$message, $headers)?"Enviado Con Exito":"Error al Enviar";
    }
?>
