<?php
include "db.php";
if($_GET['q']){
    $sql = mysqli_query($enlace, "SELECT * FROM contacto WHERE usuario LIKE  '%". $_GET['q'] ."%' OR correo LIKE '%". $_GET['q'] ."%'");
}
else{
    $sql = mysqli_query($enlace, "SELECT * FROM contacto");
}

?>

<table class="table mt-4 color2  text-center">
  <thead class="fondo1" style="border: 1px solid #495464!important;">
    <tr >
      <th scope="col">Id</th>
      <th scope="col">Correo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Estado</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_array($sql)){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><?= $row['correo'] ?></td>
      <td>
      <?php
                if($row['tipo'] == 1){
                    echo "<span class='badge badge-info'>Consulta</span>";
                }
                if($row['tipo'] == 2){
                    echo "<span class='badge badge-success'>Solicitud</span>";
                }
                if($row['tipo'] == 3){
                    echo "<span class='badge badge-danger'>Denuncia</span>";
                }
            ?>
      </td>
      <td><?php
                if($row['estado'] == 1){
                    echo "<span class='badge badge-warning'>Recibido</span>";
                }
                if($row['estado'] == 2){
                    echo "<span class='badge badge-success'>Respondido</span>";
                }
            ?></td>
      
      <td>
      <?php
                if($row['estado'] == 1){ ?>
      	<div class="row flex-center">
      	    <div class="col-3 px-0"><a href="enviaremail.php" class="color2"><i class="far fa-envelope f1 "></i></a></div>
          </div>
          <?php }
          else{ ?> 
            <span class='badge badge-secondary'>Ya han Respondido Esta solicitud</span>
          <?php } ?>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>