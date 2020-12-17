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
               <div class="col-3 px-0" onclick="editar_usuario('<?= $row['id'] ?>')"><a href="#" class="color2"><i class="fas fa-edit f1 "></i></a></div>
      		<div class="col-3 px-0" onclick="enviar_email_top('<?= $row['id'] ?>')"><a class="color2"><i class="far fa-envelope f1 "></i></a></div>
      		<div class="col-3 px-0" onclick="eliminar_usuario('<?= $row['id'] ?>')"><a  class="color2"><i class="far fa-trash-alt f1 "></i></a></div>
           <?php }
           elseif($row['tipo'] == 3){?>
      		<div class="col-3 px-0" onclick="enviar_email_top2('<?= $row['id'] ?>')" class="color2"><i class="far fa-envelope f1 "></i></a></div>
           <?php }
           else{
          ?>
          <div class="col-3 px-0" onclick="editar_usuario('<?= $row['id'] ?>')"><a href="#" class="color2"><i class="fas fa-edit f1 "></i></a></div>
      		<div class="col-3 px-0" onclick="enviar_email_top('<?= $row['id'] ?>')"><a class="color2"><i class="far fa-envelope f1 "></i></a></div>
      		<div class="col-3 px-0" onclick="eliminar_usuario('<?= $row['id'] ?>')"><a class="color2"><i class="far fa-trash-alt f1 "></i></a></div>
           <?php } ?>
      	</div>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<script>
  function editar_usuario(id){
    $.ajax({
                              url:   'include/editar_usuario.php?id='+id, 
                              type:  'GET',
                              success:  function (response) 
                                          {
                                            $("#mostrar_email").html(response);
                                            $("#modal_email").modal("show");
                                          }
                          });
  }

  function enviar_email_top(id){
      $("#modal_email2").modal("show");
      $("#id_usuario").val(id);
  }

  function enviar_email_top2(id){
      $("#modal_email3").modal("show");
      $("#id_usuario").val(id);
      $("#id_usuario_admin").val(id);
  }

  function eliminar_usuario(id){
    $.ajax({
                              url:   'include/eliminar_usuario.php?id='+id, 
                              type:  'GET',
                              success:  function (response) 
                                          {
                                            if(response == 1){
                                              setTimeout("location.href='usuarios.php'", 10);
                                            }
                                            
                                          }
                          });
  } 
  
</script>


<!-- Modal -->
<div class="modal  fade right" id="modal_email" tabindex="-1" role="dialog" aria-labelledby="modal1."
  aria-hidden="true">
  <div class="modal-dialog  modal-lg  colormodal" role="document">
    <div class="modal-content p-5">
      
      <div class="modal-body">
        <div class="text-center" id="mostrar_email">
          
        </div>
       
      </div>
      
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal  fade right" id="modal_email2" tabindex="-1" role="dialog" aria-labelledby="modal1."
  aria-hidden="true">
  <div class="modal-dialog  modal-lg  colormodal" role="document">
    <div class="modal-content p-5">
      
      <div class="modal-body">
        <div class="text-center" id="enviar_email_desc">
        <h2 class="font-weight-bold">Enviar Email a Usuario</h2>
           
           <div class="row justify-content-center" >
            <div class="col-8">
              <form id="enviar_email_iop"  onsubmit="return submit_email_top();">
                  <div class="md-form w-100">
                  <input type="hidden" name="id_usuario" id="id_usuario">
                  <select name="tipo_email" id="tipo_email" onchange="tipo_email_mostrar()" class="form-control f3" id="">
                  <option value="">Seleccion El Tipo de Email</option>
                  <option value="1">Personalizado</option>
                  <option value="2">Recuperacion de Contraseña</option>
                  </select>
                </div>    

                <div class="md-form w-100" style="display: none;" id="personalizado_id">
                  <textarea name="personalizado" id="personalizado" class="form-control f3" cols="30" rows="10"></textarea>
                </div>    
            </div>
           

           </div>
           <div class="row d-flex justify-content-center">
            <div class="col-6">
              <div class="row justify-content-center">
                 
             <div class="col-12">
               <button class="btn btn2" type="submit" >Actualizar</button>
             </div>
              </div>
            </div>
            </form>
           </div>

        </div>
       
      </div>
      
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal  fade right" id="modal_email3" tabindex="-1" role="dialog" aria-labelledby="modal1."
  aria-hidden="true">
  <div class="modal-dialog  modal-lg  colormodal" role="document">
    <div class="modal-content p-5">
      
      <div class="modal-body">
        <div class="text-center" id="enviar_email_desc">
        <h2 class="font-weight-bold">Enviar Email a Administrador </h2>
           
           <div class="row justify-content-center" >
            <div class="col-8">
              <form id="enviar_email_iop2"  onsubmit="return submit_email_top2();">
                  
                <div class="md-form w-100"  id="personalizado_id">
                  <textarea name="personalizado" id="personalizado" class="form-control f3" cols="30" rows="10"></textarea>
                  <input type="hidden" id="id_usuario_admin" name="id_usuario_admin">
                </div>    
            </div>
           

           </div>
           <div class="row d-flex justify-content-center">
            <div class="col-6">
              <div class="row justify-content-center">
                 
             <div class="col-12">
               <button class="btn btn2" type="submit" >Actualizar</button>
             </div>
              </div>
            </div>
            </form>
           </div>

        </div>
       
      </div>
      
    </div>
  </div>
</div>


<script>
function tipo_email_mostrar(){
    var param = $("#tipo_email").val();
    if(param == 1){
    $("#personalizado_id").show();
    }
    else{
      $("#personalizado_id").hide();
    }
  }

  function submit_email_top(){
    var param = $("#enviar_email_iop").serialize();

    $.ajax({
                              data: param,
                              url:   'include/enviar_email_top.php', 
                              type:  'POST',
                              success:  function (response) 
                                          {
                                            $("#enviar_email_desc").html(response);
                                            setTimeout("location.href='usuarios.php'", 10);
                                          }
                          });
                          return false;
  }

  function submit_email_top2(){
    var param = $("#enviar_email_iop2").serialize();

    $.ajax({
                              data: param,
                              url:   'include/enviar_email_admin.php', 
                              type:  'POST',
                              success:  function (response) 
                                          {
                                            $("#enviar_email_desc").html(response);
                                            //setTimeout("location.href='usuarios.php'", 10);
                                          }
                          });
                          return false;
  }

</script>