<?php 
session_start();
include "db.php";
if(isset($_SESSION['id']) && $_SESSION['tipo'] == 3){

}
else{
	header("Location: index.php");
}

	include("include/header.php");

	if(isset($_POST['link'])){
		$link = $_POST['link'];
		$texto_link = $_POST['texto_link'];
		$texto = $_POST['texto'];

		include "db.php";
		mysqli_set_charset($enlace,"utf8");

		$sql = mysqli_query($enlace, "UPDATE nube SET link = '$link', texto = '$texto', texto_link = '$texto_link' ");
		if($sql){
			$mostrar = si;
		}
	}

	include "db.php";
	mysqli_set_charset($enlace,"utf8");
	$sql = mysqli_query($enlace, "SELECT * FROM nube WHERE id = 1");
	$row = mysqli_fetch_array($sql);
 ?>

		
		<div class="w-100">
			<div id="content">
			<section>
				<div class="container-fluid">
					<h2 class="font-weight-bold my-3 text-center mt-lg-5">Configuracion Nube Sorteos</h2>
					<div class="row d-flex justify-content-center">
						<div class="col-lg-8 mt-4">
							<!-- <button class="btn boton1"><i class="fas fa-plus"></i> Nuevo</button> -->
							<div class="row mt-4">
								<div class="col-lg-6"></div>
								<div class="col-lg-6">
									<form class="form-inline ">
                                
                                </form>
								</div>
							</div>
							
            <div id="mostrar">
            	<?php if(isset($mostrar) && $mostrar == 'si'){ ?>
            	<div class="alert alert-success" role="alert">
				  Guardado Correctamente
				</div>
			<?php } ?>
            	<form action="" method="post">
            		<div class="form-group">
            			<label>Texto que se mostrara en el link</label>
            			<input type="text" class="form-control" value="<?= $row['texto_link'] ?>" name="texto_link" >
            		</div>

            		<div class="form-group">
            			<label>Link</label>
            			<input type="text" class="form-control" value="<?= $row['link'] ?>" name="link" >
            		</div>

            		<div class="form-group">
            			<label>Texto</label>
            			<textarea name="texto" class="form-control"><?= $row['texto'] ?></textarea>
            		</div>
            		
            		<div class="form-group">
            			<input type="submit" class="form-control btn btn-success" value="Guardar" name="">
            		</div>
            	</form>
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
