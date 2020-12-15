<?php
include "db.php";

$sql = mysqli_query($enlace, "SELECT * FROM usuarios WHERE id = '". $_GET['id'] ."'");
$row = mysqli_fetch_array($sql);
?>



<h2 class="font-weight-bold">Editar Usuario</h2>
           
           <div class="row justify-content-center" >
            <div class="col-8">
              <form id="actualizar_datos_user">
                  <div class="md-form w-100">
                    <p class="text-left pb-0 mb-0 font-weight-bolder" style="font-size: 13px;">Usuario:</p>
  <input type="text" id="usuario" name="usuario" value="<?= $row['usuario'] ?>" class="form-control f3">
  <!-- <label for="nombre">Usuario</label> -->
</div>
<div class="md-form w-100">
   <p class="text-left pb-0 mb-0 font-weight-bolder" style="font-size: 13px;">Correo:</p>
  <input type="text" id="correo" name="correo" value="<?= $row['correo'] ?>" class="form-control f3">
  <!-- <label for="apellido">Correo</label> -->
</div>      
            </div>
           

           </div>
           <div class="row d-flex justify-content-center">
            <div class="col-6">
              <div class="row justify-content-center">
                 
             <div class="col-12">
               <button class="btn btn2" onclick="actualizar_datos(<?= $_GET['id'] ?>)">Actualizar</button>
             </div>
              </div>
            </div>
            </form>
           </div>


           <script>
                function actualizar_datos(id){
                        var param = $("#actualizar_datos_user").serialize();

                        $.ajax({
                              data: param,
                              url:   'include/guardar_usuario.php?id='+id, 
                              type:  'POST',
                              success:  function (response) 
                                          {
                                            $("#mostrar_email").html(response);
                                            $("#modal_email").modal("hide");

                                            $.ajax({
                                                url:   'include/usuarios.php', 
                                                type:  'GET',
                                                success:  function (response) 
                                                            {
                                                                $("#mostrar").html(response);
                                                            }
                                            });
                                          }
                          });
                }           
           </script>