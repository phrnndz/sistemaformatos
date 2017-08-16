				<div class="row">
					<button class="btn" onclick="add_puesto()"><i class="glyphicon glyphicon-plus"></i>Nuevo Puesto</button>
				</div>
				<div class="row">
					<table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
									<th>Nombre</th>
                  <th>Área</th>
									<th>Nivel</th>
									<th>Descripción</th>
                  <th>Jefe</th>
                  <th>Competencia</th>
                  <th>Status</th>
                  <th>Acciones</th>
						</tr>
						</thead>
						<tbody>
					<?php  foreach ($gerencias as $item) { ?>
 						<tr>
							<td><?php echo $item['clave_puesto'];?></td>
							<td><?php echo $item['area_puesto'];?></td>
              <td><?php echo $item['nivel_puesto'];?></td>
              <td><?php echo $item['descripcion_nivel'];?></td>
              <td><?php echo $item['jefe_puesto'];?></td>
              <td><?php echo $item['competencia_puesto'];?></td>
              <td>
                <?php if ($item['status']==='1') {  ?>
                  <span class="label label-success">Activo</span>
                <?php }else{ ?>
                  <span class="label label-danger">Inactivo</span>
                <?php } ?>
              </td>
							<td>
								<button class="btn btn-warning" onclick="edit_puesto(<?php echo $item['id_puesto'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-danger" onclick="delete_puesto(<?php echo $item['id_puesto'];?>)"><i class="glyphicon glyphicon-remove"></i></button>
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
 
 
    function add_puesto()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    }
 
    function edit_puesto(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('/MantenimientoRegistros/ajax_edit_puesto')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_puesto"]').val(data.id_puesto);
            $('[name="clave_puesto"]').val(data.clave_puesto);
            $('[name="nombre_puesto"]').val(data.nombre_puesto);
            $('[name="area_puesto"]').val(data.area_puesto);
            $('[name="nivel_puesto"]').val(data.nivel_puesto);
            $('[name="descripcion_nivel"]').val(data.descripcion_nivel);
            $('[name="jefe_puesto"]').val(data.jefe_puesto);
            $('[name="competencia_puesto"]').val(data.competencia_puesto);
            $('[name="status"]').val(data.status);
            
 
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
          url = "<?php echo site_url('/MantenimientoRegistros/puesto_add')?>";
      }
      else
      {
        url = "<?php echo site_url('/MantenimientoRegistros/puesto_update')?>";
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
 
    function delete_puesto(id)
    {
      if(confirm('¿Está seguro de eliminar este puesto?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('/MantenimientoRegistros/puesto_delete')?>/"+id,
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
  <script>
  $(document).ready( function () {
    $('#tableUsers').DataTable();
  } );

  </script>
 
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title">Nuevo Puesto</h3>
	      </div>
        <form action="#" id="form" class="form-horizontal">
           <input type="hidden" value="" name="id_puesto"/> 
            <div class="form-group">
              <label class="control-label col-md-3">Puestos</label>
              <div class="col-md-9">
                <input name="clave_puesto" placeholder="Clave Puesto" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nombre</label>
              <div class="col-md-9">
                <input name="nombre_puesto" placeholder="nombre_puesto" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Área</label>
              <div class="col-md-9">
				<input name="area_puesto" placeholder="Área" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nivel</label>
              <div class="col-md-9">
				<input name="nivel_puesto" placeholder="Nivel" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Descripcion</label>
              <div class="col-md-9">
				<input name="descripcion_nivel" placeholder="Descripción" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Jefe Inmediato</label>
              <div class="col-md-9">
				<input name="jefe_puesto" placeholder="Jefe Inmediato" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Competencia</label>
              <div class="col-md-9">
				<input name="competencia_puesto" placeholder="Competencia" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Estatus</label>
              <div class="col-md-9">
              <select name="status" id="puestoRecibe" class="form-control">
                <option value="1">Activado</option>
                <option value="0">Desactivado</option>
              </select>
              </div>
            </div>
        </form>
     
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
