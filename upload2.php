<?php
$temp = explode(".", $_FILES["file"]["name"]); 
$newfilename = round(microtime(true)) . '.' . end($temp); 
move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $newfilename)?"Todo Ok":"Error al ejecutar la subida";


session_start();
require_once 'db.php';

$id_anuncio =  $_SESSION['anuncio_verificar'];
$link = $_GET['link'];
    $sql = mysqli_query($enlace, "INSERT INTO promociones (imagen, link) VALUES ('". $newfilename ."', '$link')");

    if($sql){
        echo "Todo correcto";
    }
    else{
        echo 0;
    }