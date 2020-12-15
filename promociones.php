<?php 
session_start();
include "db.php";
if(isset($_SESSION['id']) && $_SESSION['tipo'] == 3){

}
else{
	header("Location: index.php");
}

if(isset($_GET['eliminar'])){
	$sql = mysqli_query($enlace, "DELETE FROM promociones WHERE id = '". $_GET['eliminar'] ."'");
}

	include("include/header.php");
 ?>

		
		<div class="w-100">
			<div id="content">
			<section>
				<div class="container-fluid">
					<h2 class="font-weight-bold my-3 text-center mt-lg-5">Promociones</h2>
					<div class="row d-flex justify-content-center">
						<div class="col-lg-8 mt-4">
							 <button class="btn boton1" onclick="mostrar_modal()"><i class="fas fa-plus"></i> Nueva Promocion</button> 
							<div class="row mt-4">
								<div class="col-lg-6"></div>
								<div class="col-lg-6">
									
								</div>
							</div>
							
            <div id="mostrar">
            <?php
                include("include/promociones.php");
            ?>
            </div>

					</div>
					</div>
					
				</div>
			</section>
		</div>
		</div>
		
	</div>
	</main>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
   
</script>

<!-- Modal -->
<div class="modal  fade right" id="modal_promociones" tabindex="-1" role="dialog" aria-labelledby="modal1."
  aria-hidden="true">
  <div class="modal-dialog  modal-lg  colormodal" role="document">
    <div class="modal-content p-5">
      
      <div class="modal-body">
        <div class="text-center">
           <h2 class="font-weight-bold">Cree una Promo</h2>
           
           <div class="row justify-content-center">
            <div class="col-8"><form>
                  <div class="md-form w-100">
					<input type="text" id="link" class="form-control f3">
					<label for="nombre">Link</label>
					</div>
					<div class="md-form w-100">
					<input type="file" name="image" id="image" class="form-control f3">
					<label for="apellido">Foto</label>
					</div>
					
            </div>
           

           </div>
           <div class="row d-flex justify-content-center">
            <div class="col-6">
              <div class="row justify-content-center">
                 
             <div class="col-12">
               <button class="btn btn2" onclick="guardar_promocion()">Enviar</button>
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
	function mostrar_modal(){
		$("#modal_promociones").modal("show");
	}

	function guardar_promocion(){
		var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);

		var link = $("#link").val();
        $.ajax({
            url: 'upload2.php?link='+link,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) { 
                    setTimeout("location.href='promociones.php'", 10);
                } else {
                    $("#imagenes_cargadas").html("No se han cargado imagenes, o ha sucedido un error, intentelo nuevamente");
                }
            }
        });

		return false;
	}
</script>
	<?php 
	include "include/footer.php"
 ?>
