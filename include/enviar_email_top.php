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
<body>
	<style>
	.color5 {
    color: #FA374B!important;
}
</style>
<main>
    <table width='100%'>
    <tr width = 100%''>
    <td width='33%'></td>
    <td width='33%'><img src='tresolu.com/kineshub/img/logo.png' width = '100%' alt=''></td>
    <td width='33%'></td>
    </tr>
    </table>
	<div class='container mt-2 mt-lg-5' style='position: absolute;left: 50%;'>
		
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
</html>

    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $from;
    echo mail($to,$subject,$message, $headers)?"Enviado Con Exito":"Error al Enviar";
    }
?>
