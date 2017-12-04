<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<div class="forms">
		
			<?php if ($validaMostrarForm == TRUE) { //valida si el formato está disponib  ?>
				<h3 class="title1">Añade tus datos</h3>
				<div class="form-grids row widget-shadow"> 
					<div class="form-title">
						<h4><?php echo 'Estas requisitando: '.$infoFormato; ?></h4>
					</div>
					
					<?php echo validation_errors(); ?>

						<?php echo form_open('admin/GerenciaDHO/permiso_a_cuenta_de_vacaciones_2017'); ?> 

							<div class="form-body">
							<!-- Campos ocultos -->
							<p><strong><?php echo $_SESSION['nombre_usuario']; ?></strong> te informamos que por ley te corresponden <?php echo $infoVacaciones->diasLey; ?> dias de descanso, esto debido a que tu antiguedad es  <?php echo $infoVacaciones->anios_antiguedad; ?> años</p>
							<p>Este año has usado <?php echo $diasUsadosTotal ?> dias, faltan por usar <?php echo $diasLibresTotal; ?></p>
							<hr>
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
							</div>
							<div class="form-group">
								Mi permiso es para dos días hábiles
								<input name="checkbox" id="checkbox" type="checkbox" value="1" />
							</div>
							<div class="form-group">
								<?php //echo form_error('fechaSolicitudInicio'); ?>
								<?php //echo form_error('fechaSolicitudTermino'); ?>

								<label for="permisoPeriodo1">Fecha de permiso</label>   
								<input type='text' name="permisoPeriodo1" id="permisoPeriodo1" data-language="en" placeholder="00/00/00" value="" />
								<br>
								<label for="permisoPeriodo2" id="labelpermisoPeriodo2">Fecha de permiso</label>     
								<input type='text' name="permisoPeriodo2" id="permisoPeriodo2" data-language="en" placeholder="00/00/00"  value="" />
							</div><br>
							<h3>Destinatario</h3>
							<hr>
							<?php foreach ($jefeinmediato as $value) {  ?>
								<div class="form-group">
								<label for="nombreRecibe">Jefe Inmediato</label>
								<input type="text" name="titulo_interno_usuario" id="titulo_interno_usuario" class="form-control"  value="<?php echo $value['titulo_interno_usuario_jefe']; ?> " readonly>
								<div class="form-group"> 
								<label for="nombreRecibe">Puesto</label>
								<input type="text" name="clavepuestojefe" id="clavepuestojefe" class="form-control" value="<?php echo $value['clave_puesto_jefe']; ?>" readonly> 
								</div>
								<br><br>
								<input type="hidden" name="badgenumberjefe" id="badgenumberjefe" value="<?php echo $value['badgenumber_jefe']; ?>" >
								<input type="hidden" name="idpuestojefe" id="idpuestojefe" value="<?php echo $value['id_puesto_jefe']; ?>" >

								
							<?php } ?>
							<button type="submit" class="btn btn-default">Continuar</button> 
							<?php echo form_close(); ?> 
					</div>
				</div>
			<? }else{ ?>
				<div class="panel-info widget-shadow"> 
					 <h2>Formato no disponible has superado el límite de dos permisos a cuenta de vacaciones en un año</h2>
					 <br><br>
						<table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<tbody>
							<tr>
								<th>Permiso</th>
								<th>Inicio</th>
								<th>Termino</th>
							</tr>
							<tr>
					             <td>Permiso 1</td>
					             <td><?php echo $infoVacaciones->permiso_periodo_1_inicio;?></td>
					             <td><?php echo $infoVacaciones->permiso_periodo_1_termino;?></td>
							</tr>
							<tr>
								 <td>Permiso 2</td>
								 <td><?php echo $infoVacaciones->permiso_periodo_2_inicio;?></td>
								 <td><?php echo $infoVacaciones->permiso_periodo_2_termino;?></td>
							</tr>
							</tbody>
						</table>
						<a class="btn btn-primary" href="<?php echo base_url();?>admin/">Aceptar</a> 

				</div>
			<?php } //termina else?>
		</div>
	</div>
</div>



<!-- scripts detallados  -->
	<script>
	$( document ).ready(function() {
		$('#permisoPeriodo2').hide();
		$('#labelpermisoPeriodo2').hide();

		$('#checkbox').click(function() {
		  $('#permisoPeriodo2')[this.checked ? "show" : "hide"]();
		  $('#labelpermisoPeriodo2')[this.checked ? "show" : "hide"]();
		});

		$('#permisoPeriodo1').datepicker({
			minDate: new Date(),
			dateFormat: 'yyyy-mm-dd',
		});
		$('#permisoPeriodo2').datepicker({
			minDate: new Date(),
			dateFormat: 'yyyy-mm-dd',
		});

	});
	</script>

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
		}//termina success
	  });}

	</script>

