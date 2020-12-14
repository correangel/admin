<?php

include "db.php";
$id = $_GET['id'];
$usuario =  $_POST['usuario'];
$correo = $_POST['correo'];

$sql = mysqli_query($enlace, "UPDATE usuarios SET usuario = '$usuario', correo = '$correo' WHERE id = '$id'");

if($sql){
    echo "Usuario Actualizado con exito"; ?>
<div class="row d-flex justify-content-center">
            <div class="col-6">
              <div class="row justify-content-center">
                 
             <div class="col-12">
               <button class="btn btn2" data-dismiss="modal" aria-label="Close">Cerrar</button>
             </div>
              </div>
            </div>
    <?php
}

?>