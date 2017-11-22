<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<div class="forms">
			<h3 class="title1">Añade tus datos</h3>
			<div class="form-grids row widget-shadow"> 
				<div class="form-title">
					<h4><?php echo 'Estas requisitando: '.$infoFormato; ?></h4>
				</div>
				
				<?php echo validation_errors(); ?>

				<?php echo form_open('admin/GerenciaDHO/llamada_de_atencion_2017'); ?> 

				<div class="form-body">
					<!-- Campos ocultos -->
					<h3>Remitente</h3>
					<hr>
					<input type="hidden" name="formatoRequisitado" value="<?php echo $infoFormato; ?>" />
					<div class="form-group"> 
				        <input type="text" name="nombreEmpleado" id="nombreEmpleado" class="form-control" value="<?php echo $_SESSION['nombre_usuario']; ?>" readonly> 
					</div> 
					<div class="form-group">
				        <input type="text" name="puestoTrabajo" id="puestoTrabajo" class="form-control"  value="<?php echo $_SESSION['puesto_nombre']; ?>" readonly>
					</div>
					<br><br>
					<h3>Destinatario</h3>
					<hr>
					<div class="form-group">
						<label for="irregularidadTexto">Irregularidades incurridas</label>
						<textarea name="irregularidadTexto" id="irregularidadTexto" cols="50" rows="4" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="nombreRecibe">A quien diriges la llamada de atención</label>
						<select name="claveRecibe" id="claveRecibe" class="form-control">
							 <?php  foreach ($directivos as $directivo) { ?>
								<option value="<?php echo $directivo['badgenumber'] ?>"><?php echo $directivo['titulo_interno_usuario'] ?></option>
							 <?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="puestoRecibe">Puesto de trabajo</label>
						<select name="puestoRecibe" id="puestoRecibe" class="form-control" readonly>
								<option value=""></option>
						</select>
					</div>

					<button type="submit" class="btn btn-default">Continuar</button> 
					<?php echo form_close(); ?> 
				</div>
			</div>
		</div>


	</div>
</div>

<!-- scripts detallados  -->
	<script>
	$( document ).ready(function() {
		// Initialization
		var id = $('#claveRecibe').val();
	    populate_submenu(id);
		$( "#claveRecibe" ).change(function() {
	       	var id = $('#claveRecibe').val();
	        populate_submenu(id);
	       });

	});
	</script>
	<script>


function populate_submenu(id) {
  $('#puestoRecibe').empty();
  $('#puestoRecibe').append("<option>Loading ....</option>");
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('admin/populatePuesto')?>/" + id,
    dataType: 'json',
    success: function(data) {
    	console.log('hola pamela');
    	console.log(JSON.stringify(data));
      $('#puestoRecibe').empty();
	    $.each(data, function(key, value) {
	        $('#puestoRecibe').append('<option value="'+ value.id_puesto +'">'+ value.clavepuesto +'</option>');
	    });
}
  });
}

	</script>