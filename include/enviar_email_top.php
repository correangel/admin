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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>
    <!-- Google Fonts -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap'>
    <!-- Bootstrap core CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Material Design Bootstrap -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='tresolu.com/kineshub/css/estilo.css'>

    
    <style>
    header , footer{
        display: none;
    }
    </style>
    <main>
    <div class='container mt-2 mt-lg-5'>
        <div class='row d-flex justify-content-center mt-0 pt-lg-5'>
            <div class='col-lg-3 col-8 text-center'>
                <img src='tresolu.com/kineshub/img/logo.png' class='w-100' alt=''>

            </div>
        </div>
        
        <div class='row justify-content-center mt-5'>
            <div class='col-lg-6 col-10 text-center'>
                <h2 class='font-weight-bold h2-responsive'>Hola,</h2>
                <h1 class='font-weight-bold h1-responsive'> $usuario </h1>
            </div>
        </div>
        <p class='text-center font-weight-bold'>---</p>
        <div class='row justify-content-center mt-2'>
            <div class='col-lg-6 col-10 text-center'>
                <h4 class='font-weight-normal '>Necesitamos Contactar Contigo:
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
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $from;
    echo mail($to,$subject,$message, $headers)?"Enviado Con Exito":"Error al Enviar";
    }
?>
