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
					<div class="col-md-12">
					<!-- PENDIENTES POR AUTORIZAR -->
					<div class="grids widget-shadow">
						<h3 class="title1">Pendientes por Autorizar</h3>
						<?php if (empty($solicitudes)) { ?>
							<p>No hay solitudes pendientes</p>
						<?php } else {?>
							<?php  foreach ($solicitudes as $item) { ?>
								<?php // var_dump($solicitudes); exit(); ?>
								<!-- CREA GET -->
								<p><?php echo $item['nombre_usuario'];?> <a href="admin/revisaSolicitud/<?php echo $item['id_historial_formatos'] ?>?<?php echo $item['get'];?>">VER SOLICITUD</a></p>
							<?php } ?>
						<?php } ?>	
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="grids widget-shadow">
							<h3 class="title1">Solicitudes Enviadas</h3>
							<?php if (empty($solicitudesPend) && empty($solicitudesAcep) && empty($solicitudesRech)) {?>
								<p>No has enviado solicitudes</p>
							<?php } else {?>
								<?php  foreach ($solicitudesPend as $item) { ?>
									<p><?php echo $item['slug_formato'];?>
										<span class="label label-default">  Pendiente</span>
										<!-- <a href="<?php //echo base_url().'admin/showPDF/'.$item['slug_formato'].'?'.$item['get']; ?>">
											<i class="fa fa-print fa-2x" aria-hidden="true"></i>
										</a> -->
									</p>
								<?php } ?>
								<?php  foreach ($solicitudesAcep as $item) { ?>
									<p><?php echo $item['slug_formato'];?>
										<span class="label label-success">  Aceptada</span>
										<a href="<?php echo base_url().'admin/showPDF/'.$item['slug_formato'].'?'.$item['get']; ?>">
											<i class="fa fa-print fa-2x" aria-hidden="true"></i>
										</a>
									</p>
								<?php } ?>	
								<?php  foreach ($solicitudesRech as $item) { ?>
									<p><?php echo $item['slug_formato'];?>
										<span class="label label-danger">  Rechazada</span>
										<<!-- a href="<?php //echo base_url().'admin/showPDF/'.$item['slug_formato'].'?'.$item['get']; ?>">
											<i class="fa fa-print fa-2x" aria-hidden="true"></i>
										</a> -->
									</p>
								<?php } ?>	
							<?php } ?>		
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<!-- LISTA DE DESPARTAMENTOS -->
						<div class="grids widget-shadow">
							<h3 class="title1">Departamentos</h3>
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