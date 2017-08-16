<div id="page-wrapper" style="min-height: 487px;">
	<div class="main-page">
		<h3 class="title1">Mantenimiento de información</h3>
		<div class="grids widget-shadow">
			<div class="form-group mb-n">
        <div class="row">
          <a href=" <?php echo base_url();?>MantenimientoRegistros/">Usuarios</a>
          <a href=" <?php echo base_url();?>MantenimientoRegistros/formatos">formatos</a>
          <a href=" <?php echo base_url();?>MantenimientoRegistros/gerencias">gerencias</a>
          <a href=" <?php echo base_url();?>MantenimientoRegistros/puestos">puestos</a>
        </div>
				<div class="row">
					<button class="btn" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i>Nuevo Usuario</button>
				</div>
				<div class="row">
					<table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
									<th>Clave</th>
									<th>Nombre</th>
									<th>Titulo</th>
									<th>Unidad</th>
									<th>Fecha Ingreso</th>
									<th>Fecha Contrato</th>
									<th>Nombre Interno</th>
									<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
					<?php  foreach ($usuarios as $item) { ?>
 						<tr>
							<td><?php echo $item['pk_clave_usuario'];?></td>
							<td><?php echo $item['nombre_usuario'];?></td>
							<td><?php echo $item['titulo_usuario'];?></td>
							<td><?php echo $item['unidad_usuario'];?></td>
							<td><?php echo $item['ingreso_usuario'];?></td>
							<td><?php echo $item['contrato_usuario'];?></td>
							<!-- <td><?php //echo $item['puesto_nombre_oficial'];?></td> -->
							<td><?php echo $item['nombre_interno_usuario'];?></td>
							<!-- <td><?php // echo $item['iniciales_usuario'];?></td>
							<td><?php // echo $item['clave_usuario'];?></td>
							<td><?php // echo $item['area_usuario'];?></td> -->
							<td>
								<button class="btn btn-warning" onclick="edit_user(<?php echo $item['id_usuario'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
								<button class="btn btn-danger" onclick="delete_user(<?php echo $item['id_usuario'];?>)"><i class="glyphicon glyphicon-remove"></i></button>
							</td>
						</tr>
					<?php } ?>
				</div>
			</div>	
		</div>
	</div>
</div>




<script type="text/javascript">
  $(document).ready( function () {
      $('#tableUsers').DataTable();
  } );
    var save_method; //for save method string
    var table;
 
 
    function add_user()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    }
 
    function edit_user(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('/MantenimientoRegistros/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_usuario"]').val(data.id_usuario);
            $('[name="pk_clave_usuario"]').val(data.pk_clave_usuario);
            $('[name="nombre_usuario"]').val(data.nombre_usuario);
            $('[name="titulo_usuario"]').val(data.titulo_usuario);
            $('[name="unidad_usuario"]').val(data.unidad_usuario);
            $('[name="ingreso_usuario"]').val(data.ingreso_usuario);
            $('[name="contrato_usuario"]').val(data.contrato_usuario);
            $('[name="puesto_nombre_oficial"]').val(data.puesto_nombre_oficial);
            $('[name="nombre_interno_usuario"]').val(data.nombre_interno_usuario);
            $('[name="iniciales_usuario"]').val(data.iniciales_usuario);
            $('[name="clave_usuario"]').val(data.clave_usuario);
            $('[name="area_usuario"]').val(data.area_usuario); 
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Modifica Usuario'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
 
 
 
    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('/MantenimientoRegistros/user_add')?>";
      }
      else
      {
        url = "<?php echo site_url('/MantenimientoRegistros/user_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               // alert('Guardado');

              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
 
    function delete_user(id)
    {
      if(confirm('¿Está seguro de eliminar este usuario?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('/MantenimientoRegistros/user_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
      }
    }

 
  </script>
 
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title">Nuevo Usuario</h3>
	      </div>
        <form action="#" id="form" class="form-horizontal">
           <input type="hidden" value="" name="id_usuario"/> 
            <div class="form-group">
              <label class="control-label col-md-3">Clave Usuario</label>
              <div class="col-md-9">
                <input name="pk_clave_usuario" placeholder="Clave Usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nombre Usuario</label>
              <div class="col-md-9">
                <input name="nombre_usuario" placeholder="nombre_usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Titulo Usuario</label>
              <div class="col-md-9">
				<input name="titulo_usuario" placeholder="Titulo Usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Unidad Usuario</label>
              <div class="col-md-9">
				<input name="unidad_usuario" placeholder="Unidad Usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Ingreso Usuario</label>
              <div class="col-md-9">
				<input name="ingreso_usuario" placeholder="Ingreso Usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Contrato Usuario</label>
              <div class="col-md-9">
				<input name="contrato_usuario" placeholder="Contrato Usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Puesto Oficial</label>
              <div class="col-md-9">
				<input name="puesto_nombre_oficial" placeholder="Puesto Oficial" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nombre Interno</label>
              <div class="col-md-9">
				<input name="nombre_interno_usuario" placeholder="Nombre Interno" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Iniciales</label>
              <div class="col-md-9">
				<input name="iniciales_usuario" placeholder="Contrato Usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Clave</label>
              <div class="col-md-9">
				<input name="clave_usuario" placeholder="Clave" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Area</label>
              <div class="col-md-9">
				<input name="area_usuario" placeholder="Area" class="form-control" type="text">
              </div>
            </div>
        </form>
     
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->