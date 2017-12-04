<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="badgenumber">ID de usuario</label>
					<input type="text" class="form-control" id="badgenumber" name="badgenumber" placeholder="Ingresa tu ID">
				</div>
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Ingresar">
				</div>
			</form>
		</div>
	</div><!-- .row -->
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn" data-toggle="modal" data-target="#myModal">
			  ¿Olvidaste o no sabes tu número de control?
			</button>
		</div>
	</div>
</div><!-- .container -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content"  style="padding: 1em;">
      <div class="form-group">
	    <div class="input-group">
	     <span class="input-group-addon">Busqueda</span>
	     <input type="text" name="search_text" id="search_text" placeholder="Escribe tu nombre" class="form-control" />
	    </div>
   		<div id="result"></div>
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>

<script>
$(document).ready(function(){

	$( "#search_text" ).keyup(function() {
	  	var nombre = $('#search_text').val();
	   	console.log(nombre);
	    busquedausuario(nombre);
	});
});

function busquedausuario(nombre){
	$('#result').empty();
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('user/busquedanombre/')?>/" + nombre,
		dataType: 'json',
		success: function(data) {
		  	$('#result').empty();
		  	$('#result').empty();
		    $.each(data, function(key, value) {
		        $('#result').append( "<p>"+value.badgenumber+" - "+value.name+" "+value.lastname+"</p>" );
		    });
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        console.log(xhr.status);
		        console.log(thrownError);
	      	}
	});
}

</script>