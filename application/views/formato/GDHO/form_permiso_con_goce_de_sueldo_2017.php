<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<div class="forms">
		
			
				<h3 class="title1">Añade tus datos</h3>
				<div class="form-grids row widget-shadow"> 
					<div class="form-title">
						<h4><?php echo 'Estas requisitando: '.$infoFormato; ?></h4>
					</div>
					
					<?php echo validation_errors(); ?>

						<?php echo form_open('admin/GerenciaDHO/permiso_con_goce_de_sueldo_2017'); ?> 

							<div class="form-body">
							<input type="hidden" name="formatoRequisitado" value="<?php echo $infoFormato; ?>" />

							<div class="form-group"> 
						        <?php //echo form_error('nombreEmpleado'); ?>

								<label for="nombreEmpleado">Tu nombre</label>
						        <input type="text" name="nombreEmpleado" id="nombreEmpleado" class="form-control" value="<?php echo $_SESSION['nombre_usuario']; ?>" readonly> 
							</div> 
							<div class="form-group">
								<?php //echo form_error('fechaInicioLaboral'); ?>

								<label for="fechaInicioLaboral">¿Desde cuando laboras en SACIMEX?</label>
								<input type='text' name="fechaInicioLaboral" id="fechaInicioLaboral" data-language="en" class="form-control" placeholder="00/00/00" value="<?php echo $_SESSION['fecha_contratacion']; ?>" readonly/>
							</div>
							<div class="form-group">
								<label for="puestoTrabajo">¿Cuál es tu puesto de trabajo?</label>
						        <input type="text" name="puestoTrabajo" id="puestoTrabajo" class="form-control"  value="<?php echo $_SESSION['puesto_nombre']; ?>" readonly>
							</div><br>
							<h3>Del permiso</h3>
							<hr>
							<div class="form-group">
								<label for="nombreRecibe">Motivo del permiso</label>
								<select name="motivoPermiso" id="motivoPermiso" class="form-control">
									 <?php  foreach ($permisos as $permiso) { ?>
										<option value="<?php echo $permiso['id_permiso'] ?>"><?php echo $permiso['titulo_permiso'].' ('.$permiso['dias_habiles'].' días habiles)' ?></option>
									 <?php } ?>
								</select>
								<br><br>
								<label for="permisoPeriodo1">Fecha de permiso</label>   
								<input type='text' name="permisoPeriodo1" id="permisoPeriodo1" data-language="en" placeholder="00/00/00" value="" />
								<label for="permisoPeriodo2" id="labelpermisoPeriodo2">al</label>     
								<input type='text' name="permisoPeriodo2" id="permisoPeriodo2" data-language="en" placeholder="00/00/00"  value="" readonly  disabled />
								<button id="buttonCalcula">Simular</button>

							</div><br>
							<h3>Destinatario</h3>
							<hr>
							<div class="form-group">
								<label for="nombreRecibe">¿Quién lo recibe?</label>
								<select name="claveRecibe" id="claveRecibe" class="form-control">
									 <?php  foreach ($directivos as $directivo) { ?>
										<option value="<?php echo $directivo['badgenumber'] ?>"><?php echo $directivo['titulo_interno_usuario'] ?></option>
									 <?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="puestoRecibe">Puesto de trabajo a quien va dirigido</label>
								<select name="puestoRecibe" id="puestoRecibe" class="form-control" readonly>
										<option value=""></option>
								</select>
							</div><br><br>
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

		$('#checkbox').click(function() {
		  $('#permisoPeriodo2')[this.checked ? "show" : "hide"]();
		  $('#labelpermisoPeriodo2')[this.checked ? "show" : "hide"]();
		});

		$('#permisoPeriodo1').datepicker({
			minDate: new Date(),
			dateFormat: 'yyyy-mm-dd',
		});

		var id = $('#claveRecibe').val();
	    populate_submenu(id);
		$( "#claveRecibe" ).change(function() {
	       	var id = $('#claveRecibe').val();
	        populate_submenu(id);
	       });




	});

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
		}//termina success
	  });}




	</script>


	<script>

	</script>

