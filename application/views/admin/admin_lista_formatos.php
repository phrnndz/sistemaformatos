<div id="page-wrapper" style="min-height: 487px;">
			<div class="main-page">
				<h3 class="title1">Formatos</h3>
				<?php //var_dump($formatos); exit(); ?>
				<div class="grids widget-shadow">
					<div class="form-group mb-n">
						<div class="row">
								<?php if (empty($formatos)) { ?>
									<p>No hay formatos disponibles</p>
								<?php } else {?>
									<?php  foreach ($formatos as $item) { ?>
										<div class="col-md-12 grid_box1">
											<a href=<?php echo base_url().'admin/'.$item['slug_gerencia'].'/'.$item['slug_formato']; ?>><?php echo $item['nombre_formato']; ?></a>
										</div>
									<?php } ?>
								<?php } ?>


							
							<div class="clearfix"> </div>
						</div>
					</div>	
				</div>
			</div>
		</div>