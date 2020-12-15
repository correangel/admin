<?php
include "db.php";
    $sql = mysqli_query($enlace, "SELECT * FROM promociones");
?>

<table class="table mt-4 color2  text-center">
  <thead class="fondo1" style="border: 1px solid #495464!important;">
    <tr >
      <th scope="col">Id</th>
      <th scope="col">Imagen</th>
      <th scope="col">Link</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_array($sql)){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td> <img src="images/<?= $row['imagen'] ?>" style="width: 150px !important;" alt=""> </td>
      <td><?= $row['link'] ?></td>
      <td>
      <div class="row flex-center">
              <div class="col-3 px-0"><a href="promociones.php?eliminar=<?= $row['id'] ?>" class="color2"><i class="far fa-trash-alt f1 "></i></a></div>
          </div>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>