<?php
include "db.php";
include "include/modal2.php";

    $sql = mysqli_query($enlace, "SELECT verificacion_fotos.*, anuncio.nombre AS Nombre FROM verificacion_fotos
    INNER JOIN anuncio
    ON verificacion_fotos.id_anuncio = anuncio.id
    ");

?>

<table class="table mt-4 color2  text-center">
  <thead class="fondo1" style="border: 1px solid #495464!important;">
    <tr >
      <th scope="col">Id</th>
      <th scope="col">Anuncio</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_array($sql)){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><?= $row['Nombre'] ?></td>
      <td>
      	<div class="row flex-center">
                <?php $anuncio = $row['id_anuncio']; ?>
               <div class="col-3 px-0"><a href="#" class="color2" onclick="buscar_validar('<?= $anuncio ?>')" data-toggle="modal" data-target="#modal2"><i class="fas fa-edit f1 "></i></a></div>
      		<div class="col-3 px-0"><a href="eliminar.php" class="color2"><i class="far fa-trash-alt f1 "></i></a></div>
          
      	</div>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<script>
    function buscar_validar(id){
        
        $.ajax({
                              url:   'include/modal_validar.php?q='+id, 
                              type:  'GET',
                              success:  function (response) 
                                          {
                                            $("#mostrar").html(response);
                                          }
                          });
    }
</script>