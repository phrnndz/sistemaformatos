<div id="page-wrapper" style="min-height: 487px;">
			<div class="main-page">
				<?php //print_r($datos); ?>

				<div class="tables">
					<h3 class="title1"><?php echo $_GET['formatoRequisitado'] ?></h3>
					<div class="panel-body widget-shadow">
						<h4>Revisa cuidadosamente antes de autorizar.</h4>
						<?php $queryString = $_SERVER['QUERY_STRING']; ?>
						<!-- EL IFRAME MUESTRA EL DOCUMENTO COMO SE GENERARÁ EN PDF, RENDERIZA CON CNTROLADOR showIframe -->
						<div class="col-md-8">
							<iframe width="100%" height="800" src="<?php echo base_url().'admin/showIframe/'.$_GET['formatoRequisitado'].'?'.$queryString; ?>" frameborder="0" ></iframe>
						</div>
						<div class="col-md-4">
							<?php echo form_open('admin/actualizaStatus') ?>
								<!-- AQUI PONER EL ID_HISTORIAL_FORMATO -->
								<input type="hidden" name="idSolicitud" value="<?php echo $idSolicitud;?>">
								<label for="status">Autorización</label><br>
								<input type="radio" name="status" value="A" checked>AUTORIZAR
								<input type="radio" name="status" value="R">RECHAZAR<br><br>
								<label for="comentario">Agrega un comentario</label><br>
								<textarea name="comentario_revisor" id="comentario_revisor" placeholder="Un comentario..."></textarea><br>
								<button type="submit">ACEPTAR</button>
								
							<?php echo form_close(); ?>
						</div>
							
						
					</div>
					
				</div>
			</div>
</div>