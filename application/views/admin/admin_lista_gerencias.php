<div id="page-wrapper" style="min-height: 487px;">
			<div class="main-page">
				<div class="row">
					<div class="col-md-12">
						<!-- SOLO Desarrollo Humano -->
						<?php if ($_SESSION['clave_usuario'] =='GDHO') {	?>
						<h3><a href='MantenimientoRegistros'><i class="fa fa-cogs" aria-hidden="true"></i> Mantenimiento de información</a></h3>
						<br>
						<?php } ?>
						<h3><a href='Historico'><i class="fa fa-clock-o" aria-hidden="true"></i> Mi historial</a></h3>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="grids widget-shadow">
						<div class="stats-title">
							<h3 class="title1">Formatos dirigidos hacía ti</h3>
						</div>
						<div class="stats-body">
							<ul class="list-unstyled">
								<?php if (empty($solicitudes)) { ?>
									<p>No hay solitudes pendientes</p>
								<?php } else {?>
								<table class="table">
									<thead>
										<tr>
											<th>Solicitante</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php  foreach ($solicitudes as $item) { ?>
										<tr>
											<td><?php echo $item['nombre_usuario'];?> </td>
											<td><a class="" href="admin/revisaSolicitud/<?php echo $item['id_historial_formatos'] ?>?<?php echo $item['get'];?>">VER SOLICITUD</a></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
								<?php } ?>
								
							</ul>
						</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="grids widget-shadow">
							<h3 class="title1">Mis formatos enviados</h3>
							<?php if (empty($solicitudesPend) && empty($solicitudesAcep) && empty($solicitudesRech)) {?>
								<p>No has enviado solicitudes</p>
							<?php } else {?>
							<table class="table">
								<thead>
									<tr>
										<th>Estado</th>
										<th>Fecha</th>
										<th>Formato</th>
										<th>Comentarios</th>
										<th>Destinatario</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php  foreach ($solicitudesPend as $item) { ?>
										<tr>
											<td><span class="label label-default">  Pendiente</span></td>
											<td><?php echo $item['fecha']; ?></td>
											<td><?php echo $item['slug_formato'];?></td>
											<td><?php echo $item['comentario_revisor']; ?></td>
											<td><?php echo $item['nombre_destino'];?></td>
											<td></td>
										</tr>
									<?php } ?>
									<?php  foreach ($solicitudesAcep as $item) { ?>
										<tr>
											<td><span class="label label-success">  Aceptada</span></td>
											<td><?php echo $item['fecha']; ?></td>
											<td><?php echo $item['slug_formato'];?></td>
											<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $item['comentario_revisor']; ?>">Ver</button></td>
											<td><?php echo $item['clave_destino'];?></td>
											<td><a href="<?php echo base_url().'admin/showPDF/'.$item['slug_formato'].'?'.$item['get']; ?>" target="_blank">
													<i class="fa fa-print" aria-hidden="true"></i> IMPRIMIR</i>
												</a>
											</td>
										</tr>
									<?php } ?>	
									<?php  foreach ($solicitudesRech as $item) { ?>
										<tr>
											<td><span class="label label-danger">  Rechazada</span></td>
											<td><?php echo $item['fecha']; ?></td>
											<td><?php echo $item['slug_formato'];?></td>
											<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $item['comentario_revisor']; ?>">Ver</button></td>
											<td><?php echo $item['clave_destino'];?></td>
											<td></td>
										</tr>
									<?php } ?>

								</tbody>
							</table>	
							<?php } ?>	
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<!-- LISTA DE DESPARTAMENTOS -->
						<div class="grids widget-shadow">
							<h3 class="title1">Gerencias</h3>
							<div class="form-group mb-n">
								<div class="row">
									<?php  foreach ($gerencias as $item) { ?>
										
											<a href=<?php echo base_url().'admin/gerencia/'.$item['slug_gerencia']; ?>><?php echo $item['nombre_gerencia']; ?></a><br>
										
									<?php } ?>
									<div class="clearfix"> </div>
								</div>
							</div>	
						</div>
					</div>
				</div>



			</div>
		</div>

		<script>$(function () {
						  $('[data-toggle="tooltip"]').tooltip()
						})</script>