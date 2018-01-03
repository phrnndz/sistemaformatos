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
					<?php if ($_SESSION['clave_usuario'] =='GDHO') {	?>
						<div class="col-md-12">
							<div class="grids widget-shadow">
							<div class="stats-title">
								<h3 class="title1">Formatos dirigidos a DHO</h3>
							</div>
							<div class="stats-body">
								<ul class="list-unstyled">
									<?php if (empty($solicitudesdho)) { ?>
										<p>No hay solitudes pendientes</p>
									<?php } else {?>
									<table class="table">
										<thead>
											<tr>
												<th>Solicitante</th>
												<th>Formato</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
										<?php  foreach ($solicitudesdho as $item) { ?>
											<tr>
												<td><?php echo $item['nombre_usuario'];?> </td>
												<td><?php echo $item['nombre_formato']; ?></td>
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
					<?php } ?>
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
											<th>Formato</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php  foreach ($solicitudes as $item) { ?>
										<tr>
											<td><?php echo $item['nombre_usuario'];?> </td>
											<td><?php echo $item['nombre_formato']; ?></td>
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