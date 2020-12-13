<?php
include "db.php";
if($_GET['q']){
    $sql = mysqli_query($enlace, "SELECT * FROM usuarios WHERE usuario LIKE  '%". $_GET['q'] ."%' OR correo LIKE '%". $_GET['q'] ."%'");
}
else{
    $sql = mysqli_query($enlace, "SELECT * FROM usuarios");
}

?>

<table class="table mt-4 color2  text-center">
  <thead class="fondo1" style="border: 1px solid #495464!important;">
    <tr >
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo</th>
      <th scope="col">Status</th>
      <th scope="col">Tipo de Usuario</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_array($sql)){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><?= $row['usuario'] ?></td>
      <td><?= $row['correo'] ?></td>
      <td>
        <?php 
            if($row['estado'] == 1 && $row['codigo_contrasena'] == '' && $row['codigo_validar'] == ''){
                echo "<span class='badge badge-success'>Activo</span>";
            }
            if($row['estado'] == 1 && $row['codigo_contrasena'] != ''){
                echo "<span class='badge badge-warning'>Solicitud Contraseña</span>";
            }
            if($row['estado'] == 1 && $row['codigo_validar'] != ''){
                echo "<span class='badge badge-danger'>Sin Validar</span>";
            }
            if($row['estado'] == 0){
                echo "<span class='badge badge-danger'>Inactivo</span>";
            }
        ?>
      </td>
      <td>
            <?php
                if($row['tipo'] == 1){
                    echo "<span class='badge badge-success'>Usuario</span>";
                }
                if($row['tipo'] == 2){
                    echo "<span class='badge badge-info'>Kine</span>";
                }
                if($row['tipo'] == 3){
                    echo "<span class='badge badge-danger'>Administrador</span>";
                }
            ?>
      </td>
      <td>
      	<div class="row flex-center">
          <?php
            if($row['tipo'] == 1 ){?>
               <div class="col-3 px-0"><a href="#" class="color2"><i class="fas fa-edit f1 "></i></a></div>
      		<div class="col-3 px-0"><a href="enviaremail.php" class="color2"><i class="far fa-envelope f1 "></i></a></div>
      		<div class="col-3 px-0"><a href="eliminar.php" class="color2"><i class="far fa-trash-alt f1 "></i></a></div>
           <?php }
           elseif($row['tipo'] == 3){?>
      		<div class="col-3 px-0"><a href="" class="color2"><i class="far fa-envelope f1 "></i></a></div>
           <?php }
           else{
          ?>
          <div class="col-3 px-0"><a href="#" class="color2"><i class="fas fa-edit f1 "></i></a></div>
      		<div class="col-3 px-0"><a href="" class="color2"><i class="far fa-envelope f1 "></i></a></div>
      		<div class="col-3 px-0"><a href="" class="color2"><i class="far fa-trash-alt f1 "></i></a></div>
           <?php } ?>
      	</div>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>