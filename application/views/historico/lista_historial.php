<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-clock-o" aria-hidden="true"></i> Mi historial</h3>
		</div>
	</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>Primera autorización</th>
						<th>DHO autorización</th>

						<th>Fecha</th>
						<th>Formato</th>
						<th>Solicitante</th>
						<th>Comentario Jefe Inmediato</th>
						<th>Comentario DHO</th>
						<th>Accion</th>
					</thead>
					<?php //var_dump($historial) ?>
					<tbody>
						<?php  foreach ($historial as $item) { ?>
							<tr>
								<td>
								<?php 
									$status = $item['primera_autorizacion_status'];
									if ($status =='P') {
										echo '<span class="label label-default">  Pendiente</span>';
									}elseif ($status == 'A') {
										echo '<span class="label label-success">  Aceptada</span>';
									}elseif ($status == 'R') {
										echo '<span class="label label-danger">  Rechazada</span>';	
									}
								?>
								</td>
								<td>
								<?php 
									$status = $item['segunda_autorizacion_status'];
									if ($status =='P') {
										echo '<span class="label label-default">  Pendiente</span>';
									}elseif ($status == 'A') {
										echo '<span class="label label-success">  Aceptada</span>';
									}elseif ($status == 'R') {
										echo '<span class="label label-danger">  Rechazada</span>';	
									}
								?>
								</td>
								<td><?php echo $item['fecha']; ?></td>
								<td><?php echo $item['nombre_formato'];?></td>
								<td>
									<?php 
										if ($item['clave_remitente'] == $_SESSION['pk_clave_usuario']) {
											echo '<i class="fa fa-user" aria-hidden="true"></i> '.$item['nombre_usuario'];
										}else {
											echo $item['nombre_usuario'];
										}
									?>
								</td>
								<td><?php echo $item['primera_autorizacion_comentario_revisor']; ?></td>
								<td><?php echo $item['segunda_autorizacion_comentario_revisor']; ?></td>

								<td><a href="<?php echo base_url().'admin/showPDF/'.$item['slug_formato'].'?'.$item['get']; ?>" target="_blank">
										<i class="fa fa-print" aria-hidden="true"></i> IMPRIMIR</i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>