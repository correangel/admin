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
  <?php while($row = mysqli_fetch_array($sql)){
    $id = $row['id'];
   ?>
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
      	    <div class="col-3 px-0" onclick="modal_queja('<?= $id ?>')"><a class="color2"><i class="far fa-envelope f1 "></i></a></div>
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

<!-- Modal -->
<div class="modal  fade right" id="modal_email1" tabindex="-1" role="dialog" aria-labelledby="modal1."
  aria-hidden="true">
  <div class="modal-dialog  modal-lg  colormodal" role="document">
    <div class="modal-content p-5">
      
      <div class="modal-body">
        <div class="text-center" id="enviar_email_desc">
        <h2 class="font-weight-bold"> Responder Soporte </h2>
           
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
               <button class="btn btn2" type="submit" >Enviar</button>
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


<script type="text/javascript">
  
  function modal_queja(id) {
    $.ajax({
        url:   'include/mostrar_queja.php?id='+id, 
        type:  'GET',
        success:  function (response) 
        {
          $("#personalizado_id").html(response);
          $("#modal_email1").modal("show");
        }
    });
  }

  function submit_email_top2(){
    var param = $("#enviar_email_iop2").serialize();

    $.ajax({
                              data: param,
                              url:   'include/enviar_email_soporte.php', 
                              type:  'POST',
                              success:  function (response) 
                                          {
                                            $("#enviar_email_desc").html(response);
                                            setTimeout("location.href='soporte.php'", 10);
                                          }
                          });
                          return false;
  }

</script>