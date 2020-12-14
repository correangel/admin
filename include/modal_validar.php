<?php
include "db.php";

    $id_anuncio = $_GET['q'];

    $sql = mysqli_query($enlace, "SELECT * FROM verificacion_fotos WHERE id_anuncio = '$id_anuncio'");
    if(!$sql){
        echo "error";
    }
    $row = mysqli_fetch_array($sql);

    $sql2 = mysqli_query($enlace, "SELECT * FROM imagenes WHERE id_anuncio = '$id_anuncio' LIMIT 1");
    $row2 = mysqli_fetch_array($sql2);
?>

<div class="row">
         <div class="col-6">
           <img src="<?= $url_kine ?>images/<?= $row['imagen'] ?>" class="w-100"  alt="">
         </div>
         <div class="col-6">
            <img src="<?= $url_kine ?>images/<?= $row2['imagen'] ?>" class="w-100"  alt="">
         </div>
       </div>
       <div class="row d-flex mt-8 justify-content-center">
         <div class="col-4">
           <button class="btn btn2 w-100 btn-success" onclick="aprobar_imagen('<?= $id_anuncio ?>')">Aprobar</button>
         </div>

         <div class="col-4">
           <button class="btn btn2 w-100 btn-danger" onclick="rechazar_imagen('<?= $id_anuncio ?>')">Rechazar</button>
         </div>
       </div>

       <script>
          function aprobar_imagen(id){
            $.ajax({
                              url:   'include/aprobar.php?q='+id, 
                              type:  'GET',
                              success:  function (response) 
                                          {
                                            $("#mostrar").html(response);
                                          }
                          });
          }

          function rechazar_imagen(id){
            $.ajax({
                              url:   'include/rechazar.php?q='+id, 
                              type:  'GET',
                              success:  function (response) 
                                          {
                                            $("#mostrar").html(response);
                                          }
                          });
          }
       </script>