<?php
include "db.php";

    $sql = mysqli_query($enlace, "SELECT  participar.*, usuarios.usuario AS Usuario FROM participar
    INNER JOIN usuarios
    ON usuarios.id = participar.id_usuario
    ");
    if(!$sql){ echo "error: ".mysqli_error($enlace);}
?>

<table class="table mt-4 color2  text-center">
  <thead class="fondo1" style="border: 1px solid #495464!important;">
    <tr >
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
    </tr>
  </thead>
  <tbody>  <?php while($row = mysqli_fetch_array($sql)){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <th><?= $row['Usuario'] ?></th>
    </tr>
  <?php } ?>
  </tbody>
</table>