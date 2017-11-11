<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<div class="forms">
			<h3 class="title1">Añade tus datos</h3>
			<div class="form-grids row widget-shadow"> 
				<div class="form-title">
					<h4><?php echo 'Estas requisitando: '.$infoFormato; ?></h4>
				</div>
				
				<?php echo validation_errors(); ?>

				<?php echo form_open('admin/GerenciaDHO/solicitud_de_vacaciones_2017'); ?> 

				<div class="form-body">
					<!-- Campos ocultos -->
					<h3>Remitente</h3>
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
						<?php //echo form_error('fechaSolicitudInicio'); ?>
						<?php //echo form_error('fechaSolicitudTermino'); ?>

						<label for="fechaInicioLaboral">Fecha de solicitud de vacaciones</label> 
					   del   
						<input type='text' name="fechaSolicitudInicio" id="fechaSolicitudInicio" data-language="en" placeholder="00/00/00" value="<?php echo set_value('fechaSolicitudInicio'); ?>" />   al   
						<input type='text' name="fechaSolicitudTermino" id="fechaSolicitudTermino" data-language="en" placeholder="00/00/00"  value="<?php echo set_value('fechaSolicitudTermino'); ?>" />
						
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
						<select name="puestoRecibe" id="puestoRecibe" class="form-control">
							 <?php  foreach ($puestos as $puesto) { ?>
								<option value="<?php echo $puesto['id_puesto'] ?>"><?php echo $puesto['clave_puesto'] ?></option>
							 <?php } ?>
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
		$('#fechaSolicitudInicio').datepicker({
			minDate: new Date(),
			dateFormat: 'yyyy/mm/dd',
		});
		$('#fechaSolicitudTermino').datepicker({
			minDate: new Date(),
			dateFormat: 'yyyy/mm/dd',
		});

	});
	</script>