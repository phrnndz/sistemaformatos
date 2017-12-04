<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<div class="forms">
		
			
				<h3 class="title1">Añade tus datos</h3>
				<div class="form-grids row widget-shadow"> 
					<div class="form-title">
						<h4><?php echo 'Estas requisitando: '.$infoFormato; ?></h4>
					</div>
					
					<?php echo validation_errors(); ?>

						<?php echo form_open('admin/GerenciaDHO/permiso_sin_goce_de_sueldo_2017'); ?> 

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
								<textarea type="text" name="motivoPermiso" id="motivoPermiso"></textarea> 
								<br><br>
								<label for="permisoPeriodo1">Fecha de permiso</label>   
								<input type='text' name="permisoPeriodo1" id="permisoPeriodo1" data-language="en" placeholder="00/00/00" value="" />
								<label for="permisoPeriodo2" id="labelpermisoPeriodo2">al</label>     
								<input type='text' name="permisoPeriodo2" id="permisoPeriodo2" data-language="en" placeholder="00/00/00"/>

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
			var disabledDays = [0];
			$('#permisoPeriodo1').datepicker({
				minDate: new Date(),
				dateFormat: 'yyyy-mm-dd',
				onRenderCell: function (date, cellType) {
			        if (cellType == 'day') {
			            var day = date.getDay(),
			                isDisabled = disabledDays.indexOf(day) != -1;

			            return {
			                disabled: isDisabled
			            }
			        }
			    }
			});

			$('#permisoPeriodo2').datepicker({
				minDate: new Date(),
				dateFormat: 'yyyy-mm-dd',
				onRenderCell: function (date, cellType) {
			        if (cellType == 'day') {
			            var day = date.getDay(),
			                isDisabled = disabledDays.indexOf(day) != -1;

			            return {
			                disabled: isDisabled
			            }
			        }
			    }
			});


		});




	</script>


