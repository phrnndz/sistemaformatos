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
					<!-- Campos ocultos -->
					<input type="hidden" name="formatoRequisitado" value="<?php echo $infoFormato; ?>" />
					
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
							<div class="checkbox-inline"><label><input type="radio" name="tiempo" > Un mes o menos</label></div>
							<div class="checkbox-inline"><label><input type="radio" name="tiempo" > De uno a cinco meses</label></div>
							<div class="checkbox-inline"><label><input type="radio" name="tiempo" > Más de cinco meses</label></div>
						</div>
					</div>

					<!-- niveles de satisfaccion -->

					<div class="form-group">
						<label for="checkbox" class="col-sm-4 control-label">Ambiente y trato laboral</label>
						<div class="col-sm-8">
							<div class="checkbox-inline">
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
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
								<label><input type="radio" name="1" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="2" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="3" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="4" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label><input type="radio" name="5" >
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								</label>
							</div>
						</div>
					</div>





					
					<button type="submit" class="btn btn-default">Continuar</button> 
					<?php echo form_close(); ?> 
				</div>
			</div>
		</div>


	</div>
</div>
