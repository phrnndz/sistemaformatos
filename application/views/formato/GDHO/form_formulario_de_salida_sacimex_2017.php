<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<div class="forms">
			<h3 class="title1">Contesta con la mayor veracidad posible</h3>
			<div class="form-grids row widget-shadow"> 
				<div class="form-title">
					<h4><?php echo 'Estas requisitando: '.$infoFormato; ?></h4>
				</div>
				<?php echo validation_errors(); ?>

				<?php echo form_open('admin/GerenciaDHO/formulario_de_salida_sacimex_2017'); ?> 

				<div class="form-body">

					<h4>Agradecemos mucho tu trabajo realizado en Opciones Sacimex SA de CV SOFOM ENR en beneficio de la empresa, compañeros y ambiente de trabajo. Por favor, te solicitamos nos des la oportunidad de mejorar al contestar el siguiente formulario con la mayor veracidad posible</h4><br><br>
					<!-- Campos ocultos -->
					<input type="hidden" name="formatoRequisitado" value="<?php echo $infoFormato; ?>" />
					<input type="hidden" name="claveRecibe" id="claveRecibe" value="201610046">
					<input type="hidden" name="nombreEmpleado" id="nombreEmpleado" class="form-control" value="<?php echo $_SESSION['nombre_usuario']; ?>">

					<?php foreach ($jefeinmediato as $value) {  ?>
						<input type="hidden" name="titulo_interno_usuario" id="titulo_interno_usuario" class="form-control"  value="<?php echo $value['titulo_interno_usuario_jefe']; ?> " readonly> 
						<input type="hidden" name="clavepuestojefe" id="clavepuestojefe" class="form-control" value="<?php echo $value['clave_puesto_jefe']; ?>" readonly> 

						<input type="hidden" name="badgenumberjefe" id="badgenumberjefe" value="<?php echo $value['badgenumber_jefe']; ?>" >
						<input type="hidden" name="idpuestojefe" id="idpuestojefe" value="<?php echo $value['id_puesto_jefe']; ?>" >

						
					<?php } ?>  

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">¿Cuáles son tus motivos de abandono?</label>
						<div class="col-sm-8">
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Cambio de residencia"> Cambio de residencia </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="No era lo que esperaba"> No era lo que esperaba </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Motivos Familiares"> Motivos Familiares </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Vuelvo a estudiar"> Vuelvo a estudiar </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Conflicto de intereses"> Conflicto de intereses </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Acoso o faltas eticas"> Acoso o faltas éticas </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Ambiente laboral"> Ambiente laboral </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Jefe inmediato"> Jefe inmediato </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Un mejor trabajo"> Un mejor trabajo </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Beneficios sociales"> Beneficios sociales </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Desmotivación"> Desmotivación </label></div>
							<div class="checkbox-inline1"><label><input name="motivos[]" type="checkbox" value="Sueldo"> Sueldo </label></div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">¿Cuánto tiempo llevas pensando en dejar la empresa?</label>
						<div class="col-sm-8">
							<div class="checkbox-inline"><label><input type="radio" name="tiempo" value="un mes o menos" > Un mes o menos</label></div>
							<div class="checkbox-inline"><label><input type="radio" name="tiempo" value="de uno a cinco meses" > De uno a cinco meses</label></div>
							<div class="checkbox-inline"><label><input type="radio" name="tiempo" value="mas de cinco meses" > Más de cinco meses</label></div>
						</div>
					</div>

					<!-- niveles de satisfaccion -->

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Ambiente y trato laboral</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="ambiente" value="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="ambiente" value="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="ambiente" value="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="ambiente" value="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="ambiente" value="5" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Aplicación justa de reglamentos</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="reglamentos" value="1">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reglamentos" value="2">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reglamentos" value="3">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reglamentos" value="4">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reglamentos" value="5">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Beneficios Sociales</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="beneficios" value="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="beneficios" value="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="beneficios" value="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="beneficios" value="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="beneficios" value="5" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Carga de trabajo y horarios</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="carga" value="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carga" value="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carga" value="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carga" value="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carga" value="5" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Carrera y ascenso interno</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="carrera" value="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carrera" value="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carrera" value="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carrera" value="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="carrera" value="5" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Expectativas del puesto</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="expectativas" value="1">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="expectativas" value="2">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="expectativas" value="3">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="expectativas" value="4">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="expectativas" value="5">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Objetivos de la empresa</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="objetivos" value="1">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="objetivos" value="2">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="objetivos" value="3">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="objetivos" value="4">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="objetivos" value="5">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Reconocimiento de mi labor</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="reconocimiento" value="1">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reconocimiento" value="2">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reconocimiento" value="3">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reconocimiento" value="4">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="reconocimiento" value="5">
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Salario respecto a la competencia</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="salario" value="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="salario" value="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="salario" value="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="salario" value="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="salario" value="5" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Valores de la empresa</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="valores" value="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="valores" value="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="valores" value="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="valores" value="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="valores" value="5" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group">
						<label for="txtarea1" class="col-sm-12 control-label">¿Qué era lo que MÁS te gustaba te tu trabajo y lo que MENOS te gustaba de tu trabajo?</label>
						<div class="col-sm-12"><textarea name="txtExperiencia" id="txtExperiencia" cols="50" rows="4" class="form-control1"></textarea></div>
					</div>					
					<button type="submit" class="btn btn-default">Continuar</button> 
					<?php echo form_close(); ?> 
				</div>
			</div>
		</div>


	</div>
</div>
