<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<div class="forms">
			<h3 class="title1">Añade tus datos</h3>
			<div class="form-grids row widget-shadow"> 
				<div class="form-title">
					<h4><?php echo 'Estas requisitando: '.$infoFormato; ?></h4>
				</div>
				
				<?php echo validation_errors(); ?>

				<?php echo form_open('admin/GerenciaDHO/solicitud_prestamo_laboral_2017'); ?> 

				<div class="form-body">
					<!-- Campos ocultos -->
					<h3>Remitente</h3>
					<hr>
					<input type="hidden" name="formatoRequisitado" value="<?php echo $infoFormato; ?>" />

					<div class="form-group"> 
				        <?php //echo form_error('nombreEmpleado'); ?>

						<label for="nombreEmpleado">Tu nombre</label>
				        <input type="text" name="nombreEmpleado" id="nombreEmpleado" class="form-control" value="<?php echo $_SESSION['nombre_usuario']; ?>"> 
					</div> 
					<div class="form-group">
						<label for="fechaInicioLaboral">¿Desde cuando laboras en SACIMEX?</label>
						<input type='text' name="fechaInicioLaboral" id="fechaInicioLaboral" data-language="en" class="form-control" placeholder="00/00/00" value="<?php echo $_SESSION['fecha_inicio_laboral']; ?>" />
					</div>
					<div class="form-group">
						<label for="puestoTrabajo">¿Cuál es tu puesto de trabajo?</label>
				        <input type="text" name="puestoTrabajo" id="puestoTrabajo" class="form-control"  value="<?php echo $_SESSION['puesto_nombre_oficial']; ?>">
					</div><br>
					<h3>Del préstamo</h3>
					<hr>
					<div class="form-group">

						<label for="montoSolicitado">Monto Solicitado</label> 
						<input type='number' name="montoSolicitado" id="montoSolicitado" placeholder="1000" class="form-control" />    
					</div>
					<div class="form-group">
						<label for="numeroCatorcenas">Número de catorcenas para realizar el pago (mínimo 1, máximo 20)</label>
						<input type='number' name="numeroCatorcenas" id="numeroCatorcenas" placeholder="5"  min="1" max="20" class="form-control" />    	
					</div>
					<input type="hidden" name="ultimaRetencion" id="ultimaRetencion"> 
					<div class="form-group">
						<label for="montoRetencion">Cantidad de retención de sueldo</label>
						<input type='number' name="montoRetencion" id="montoRetencion" placeholder="Ejemplo: $350" class="form-control" />    
					</div>

					<table id="vorschlaege" class="table stats-table "> 
					<thead>
						<th>Catorcena</th>
						<th>Descuento</th>
						<th>Saldo Final</th>
					</thead>
					<tbody>
						<tr>
						</tr>
						<tr></tr>
					</tbody>
						<!-- I want to insert new rows here -->
					</table>
					<br><br>
					<div class="form-group">
						<label for="tipoImprevisto">Tipo de Imprevisto</label>
						<select name="tipoImprevisto" id="tipoImprevisto" class="form-control">
							<option value=""></option>
							<option value="Trámites o licencias">Trámites o licencias</option>
							<option value="Un proyecto productivo">Un proyecto productivo</option>
							<option value="Gastos escolares">Gastos escolares</option>
							<option value="Enfermedad propia">Enfermedad propia</option>
							<option value="Enfermedades familiares">Enfermedades familiares</option>
							<option value="Adquisición de bienes">Adquisición de bienes</option>
							<option value="Pago de pasivos">Pago de pasivos</option>
						</select>    
					</div>
					<div class="form-group">
						<label for="fechaPrestamo">Fecha requeria del préstamo</label>
						<input type='text' name="fechaPrestamo" id="fechaPrestamo" data-language="en" class="form-control" placeholder="00/00/00"/>
					</div>
					<div class="form-group">
						<label for="nombreRecibe">Jefe inmediato</label>
						<select name="claveRecibe" id="claveRecibe" class="form-control">
							 <?php  foreach ($directivos as $directivo) { ?>
								<option value="<?php echo $directivo['pk_clave_usuario'] ?>"><?php echo $directivo['titulo_interno_usuario'] ?></option>
							 <?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="puestoRecibe">Puesto jefe inmediato</label>
						<select name="puestoRecibe" id="puestoRecibe" class="form-control">
							 <?php  foreach ($puestos as $puesto) { ?>
								<option value="<?php echo $puesto['id_puesto'] ?>"><?php echo $puesto['clave_puesto'] ?></option>
							 <?php } ?>
						</select>
					</div><br>
					<h3>Destinatario</h3>
					<hr>
					<div class="form-group">
						<label for="nombreRecibe">¿Quién lo recibe?</label>
						<select name="claveRecibe" id="claveRecibe" class="form-control">
							 <?php  foreach ($directivos as $directivo) { ?>
								<option value="<?php echo $directivo['pk_clave_usuario'] ?>"><?php echo $directivo['titulo_interno_usuario'] ?></option>
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
	<div>
	</div>

	</div>
</div>


<!-- scripts detallados  -->
	<script>
	$( document ).ready(function() {
		// Initialization
		$('#fechaInicioLaboral').datepicker({
		});
		$('#fechaPrestamo').datepicker({
		});

	});
	</script>


	<script>
	jQuery(document).ready(function() {
		var numeroCatorcenas 	= 0;
		var montoSolicitado		= 0;
		var montoRetencion 		= 0;
		$('#numeroCatorcenas').change(calculaPagos);
		$('#montoSolicitado').change(calculaPagos);
		$('#montoRetencion').change(calculaPagos);

		function calculaPagos(){
			var numeroCatorcenas 	= $('#numeroCatorcenas').val();
			var montoSolicitado		= $('#montoSolicitado').val();
			var montoRetencion 		= $('#montoRetencion').val();
			var fechaPrestamo 		= $('#fechaPrestamo').val(); 
			if (numeroCatorcenas!=0 && montoSolicitado!=0 && montoRetencion!=0) {
				if (numeroCatorcenas * montoRetencion > montoSolicitado) {
					alert("Error: Hay un error en los montos, intente de nuevo");
					$('#numeroCatorcenas').val('');
					$('#montoSolicitado').val('');
					$('#montoRetencion').val('');
				}else{
					var i = 1;
				    var saldo = montoSolicitado;
				    while (i <= numeroCatorcenas-1) {
				    	saldo = saldo-montoRetencion;
						$('#vorschlaege > tbody:last-child').append(
			            '<tr>'
			            +'<td>'+i+'</td>'
			            +'<td> $ '+montoRetencion+'</td>'
			            +'<td> $ '+saldo+'</td>'
			            +'</tr>');
				       	i++;
				    }
				    $('#vorschlaege > tbody:last-child').append( //ULTIMO RESULTADO
			            '<tr>'
			            +'<td>'+numeroCatorcenas+'</td>'
			            +'<td> $ '+saldo+'</td>'
			            +'<td> $ -----</td>'
			            +'</tr>');
				    $('#ultimaRetencion').val(saldo);
				}
			}else{
				console.log("falta llenar los campos");
			}
		}

	// termina ready 
	});    
	</script>