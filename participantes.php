<?php 
session_start();
include "db.php";
if(isset($_SESSION['id']) && $_SESSION['tipo'] == 3){

}
else{
	header("Location: index.php");
}

if(isset($_GET['vaciar'])){
	$sql = mysqli_query($enlace, "TRUNCATE TABLE participar");
}

	include("include/header.php");
 ?>

		
		<div class="w-100">
			<div id="content">
			<section>
				<div class="container-fluid">
					<h2 class="font-weight-bold my-3 text-center mt-lg-5">Participante Sorteo Actual</h2>
					<div class="row d-flex justify-content-center">
						<div class="col-lg-8 mt-4">
							 <a href="participantes.php?vaciar=si" class="btn boton1"><i class="fas fa-remove"></i> Vaciar E Iniciar de Nuevo</a> 
							<div class="row mt-4">
								<div class="col-lg-6"></div>
								<div class="col-lg-6">
									<form class="form-inline ">
                                
                                </form>
								</div>
							</div>
							
            <div id="mostrar">
            <?php
                include("include/participantes.php");
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
    function buscar(){
        var parametro = $("#busqueda").val();
        $.ajax({
                              url:   'include/usuarios.php?q='+parametro, 
                              type:  'GET',
                              success:  function (response) 
                                          {
                                            $("#mostrar").html(response);
                                          }
                          });
    }
</script>
	<?php 
	include "include/footer.php"
 ?>
