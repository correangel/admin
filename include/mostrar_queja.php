<?php
include "db.php";
$id = $_GET['id'];

$sql = mysqli_query($enlace, "SELECT * FROM contacto WHERE id = '$id'");
$row = mysqli_fetch_array($sql);

?>
<div class="row">
	
	<div class="col-md-6 text-dark">Tipo: </div>
	<div class="col-md-6"> 
		 <?php
                if($row['tipo'] == 1){
                    echo "<span class='btn btn-info form-control'>Consulta</span>";
                }
                if($row['tipo'] == 2){
                    echo "<span class='btn btn-success form-control'>Solicitud</span>";
                }
                if($row['tipo'] == 3){
                    echo "<span class='btn btn-danger form-control'>Denuncia</span>";
                }
            ?>
	</div>


	<div class="col-md-6 text-dark">Usuario: </div>
	<div class="col-md-6"> <?= $row['usuario']?> </div>
	<div class="col-md-6 text-dark">Correo: </div>
	<div class="col-md-6 "> <?= $row['correo']?> </div>
	<div class="col-md-6 text-dark">Link: </div>
	<div class="col-md-6 "> <?= $row['link']?> </div>
	<div class="col-md-6 text-dark">Texto: </div>
	<div class="col-md-12 "> <?= $row['texto']?> </div>


	<div class="col-md-6 text-dark">Respuesta: </div>
	<div class="col-md-12 "> 
		<input type="hidden" name="id" value="<?= $id ?>">
		<textarea class="form-control" name="texto"></textarea>
	 </div>
</div>
