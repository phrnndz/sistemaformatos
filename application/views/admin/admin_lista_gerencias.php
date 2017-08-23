<div id="page-wrapper" style="min-height: 487px;">
			<div class="main-page">
				<div class="row">
					<div class="col-md-12">
						<!-- SOLO Desarrollo Humano -->
						<?php if ($_SESSION['clave_usuario'] =='GDHO') {	?>
						<h3><a href='MantenimientoRegistros'><i class="fa fa-cogs" aria-hidden="true"></i> Mantenimiento de información</a></h3>
						<?php } ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 stats-info widget">
						<div class="stats-title">
							<h3 class="title1">Pendientes</h3>
						</div>
						<div class="stats-body">
							<ul class="list-unstyled">
								<?php if (empty($solicitudes)) { ?>
									<p>No hay solitudes pendientes</p>
								<?php } else {?>
									<?php  foreach ($solicitudes as $item) { ?>
										<?php // var_dump($solicitudes); exit(); ?>
										<li><?php echo $item['nombre_usuario'];?> <a class="pull-right" href="admin/revisaSolicitud/<?php echo $item['id_historial_formatos'] ?>?<?php echo $item['get'];?>">VER SOLICITUD</a>
										</li>
									<?php } ?>
								<?php } ?>
								
							</ul>
						</div>
					</div>
					<div class="col-md-8 stats-info stats-last widget-shadow">
							<h3 class="title1">Mis Formatos</h3>
							<?php if (empty($solicitudesPend) && empty($solicitudesAcep) && empty($solicitudesRech)) {?>
								<p>No has enviado solicitudes</p>
							<?php } else {?>
							<table class="table">
								<tbody>
									<?php  foreach ($solicitudesPend as $item) { ?>
										<tr>
											<td><span class="label label-default">  Pendiente</span></td>
											<td><?php echo $item['fecha']; ?></td>
											<td><?php echo $item['slug_formato'];?></td>
											<td><?php echo $item['comentario_revisor']; ?></td>
											<td></td>
										</tr>
									<?php } ?>
									<?php  foreach ($solicitudesAcep as $item) { ?>
										<tr>
											<td><span class="label label-success">  Aceptada</span></td>
											<td><?php echo $item['fecha']; ?></td>
											<td><?php echo $item['slug_formato'];?></td>
											<td><?php echo $item['comentario_revisor']; ?></td>
											<td><a href="<?php echo base_url().'admin/showPDF/'.$item['slug_formato'].'?'.$item['get']; ?>">
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
											<td><?php echo $item['comentario_revisor']; ?></td>
											<td></td>
										</tr>
									<?php } ?>

								</tbody>
							</table>	
							<?php } ?>	
						
					</div>
					<div class="clearfix"> </div>
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