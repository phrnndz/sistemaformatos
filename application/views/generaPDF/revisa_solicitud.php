<div id="page-wrapper" style="min-height: 487px;">
			<div class="main-page">
				<?php  //var_dump($destinatario); exit(); ?>
			<div class="forms">
				
				<div class="tables">
					<h3 class="title1"></h3>
					<div class="panel-body widget-shadow">
						<h4>Revisa tus datos antes de enviar</h4>
						<table class="table">
							<tbody>
								<tr>
									<?php foreach ($datos as $clave => $valor) { ?>
									<tr>
										<td><?php echo $clave; ?></td>
										<td><?php echo $valor; ?></td>
									</tr>
									<?php } ?>
								</tr>
								 
							</tbody>
						</table>
						<form action="<?php echo base_url().'admin/guardaDatos/' ?>">
						<?php foreach ($datos as $clave => $valor) { ?>
							<input type="hidden" name="<?php echo $clave ?>" id="<?php echo $clave ?>" value="<?php echo $valor ?>">
						<?php } ?>
						<input type="hidden" name="nombreRecibe" id="nombreRecibe" value="<?php echo $destinatario[0]['titulo_interno_usuario']; ?>">
						<input type="hidden" name="puestoRecibe" id="puestoRecibe" value="<?php echo $puesto[0]['clave_puesto']; ?>">
						<input type="hidden" name="claveUsuario" id="claveUsuario" value="<?php echo $_SESSION['badgenumber']; ?>">
						<input type="hidden" name="nombreRemitente" id=nombreRemitente value=" <?php echo $_SESSION['titulo_interno_usuario']; ?> ">
						<input type="hidden" name="claveRemitente" id="claveRemitente" value="<?php echo $_SESSION['badgenumber']; ?>">
						<input type="hidden" name="puestoRemitente" id="puestoRemitente" value="<?php echo $_SESSION['puesto_nombre']; ?>">

						<button type="submit" class="btn btn-default">Continuar</button> 
					</form>

					</div>

					<input class="btn btn-default" type="button" onclick="history.back()" value="Corregir Datos">
				</div>


			</div>
			</div>
</div>