<?php
include "db.php";

    $id_anuncio = $_GET['q'];

    $sql = mysqli_query($enlace, "UPDATE anuncio SET verificado = 1 WHERE id = '$id_anuncio'");
    if(!$sql){
        echo "error".mysqli_error($enlace);
    }
    else{
        echo "Correcto ";
    }

    $sql = mysqli_query($enlace, "DELETE FROM verificacion_fotos WHERE id_anuncio = '$id_anuncio'");
    if(!$sql){
        echo "error2";
    }

    else{
        echo "Foto aprobada";
    }


?>

<div class="row">
       <div class="row d-flex mt-8 justify-content-center">
       
        
           <button class="btn btn2 w-100 btn-danger" onclick="cerrar()">Cerrar</button>
       </div>

       <script>
            function cerrar(){
                $("#modal2").modal("hide");
            }
       </script>