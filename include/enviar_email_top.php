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
body{
    font-family: roboto;
}
.margen1{
    margin-bottom: 0px;
    margin-top: 0px;
}
.margen2{
    margin-bottom: 10px;
    margin-top: 10px;
}
.text-dark{
    color: #000;
}

</style>
<main>
    <table width='100%'>
    <tr width = '100%'>
    <td width='33%'></td>
    <td width='33%'><img src='img/logo.png' width = '100%' alt=''></td>
    <td width='33%'></td>
    </tr>
     <tr width = '100%'>
    <td width='33%'></td>
    <td width='33%'>
            <h2 class='margen1' style='text-align: center;font-weight: bold;font-size: 30px;'>Hola,</h2>
                <h1 class='margen1' style='text-align: center;font-weight: bold;font-size: 30px;'>$usuario</h1>
    </td>
    <td width='33%'></td>
    </tr>
    <tr width = '100%'>
    <td width='33%'></td>
    <td width='33%'>
                <h4 class='margen2'  style='text-align: center;font-size: 18px;font-weight: 200;'>Queremos Contactarnos contigo.
</h4>
    </td>
    <td width='33%'></td>
    </tr>
     <tr width = '100%'>
    <td width='33%'></td>
    <td width='33%'>
                <p class='margen2'  style='text-align: center;font-weight: normal;font-size: 18px;font-weight: 300;'>$mensaje
</p>
    </td>
    <td width='33%'></td>
    </tr>

      <tr width = '100%'>
    <td width='33%'></td>
    <td width='33%'>
                <p class='margen2'  style='text-align: center;font-weight: normal;font-size: 20px;font-weight: 400;'>¡Consigue la mejor compañía en tu zona al alcance de un click!
</p>
    </td>
    <td width='33%'></td>
    </tr>
     <tr width = '100%'>
    <td width='33%'></td>
    <td width='33%'>
                <p class='margen1'  style='text-align: center;font-weight: normal;font-size: 18px;font-weight: 300;'>Atentamente,
</p>
<p class='margen2'  style='text-align: center;font-weight: normal;font-size: 18px;font-weight: 300;'>Equipo Kineshub.</p>
    </td>
    <td width='33%'></td>
    </tr>

    <tr width = '100%'>
    <td width='33%'></td>
    <td width='33%'>
        <p style='text-align: center;'><a href='#' class='text-dark'><u>Kineshub.com</u></a> | <a href='#' class='text-dark'><u>  Terminos y Condiciones</u></a></p>
        <p class='margen2' style='text-align: center;font-weight: normal;font-size: 15px;font-weight: 400;'>Lima , Perú</p>
        <p class='margen2' style='text-align: center;font-weight: normal;font-size: 15px;font-weight: 400;'>©2020 Kineshub</p>

    </td>
    <td width='33%'></td>
    </tr>
    </table>
    
    
        







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
