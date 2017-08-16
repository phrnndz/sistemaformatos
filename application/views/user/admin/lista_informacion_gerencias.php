
				<div class="row">
					<table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
									<th>Nombre</th>
                  <th>Slug</th>
									<th>Status</th>
									<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
					<?php  foreach ($gerencias as $item) { ?>
 						<tr>
							<td><?php echo $item['nombre_gerencia'];?></td>
							<td><?php echo $item['slug_gerencia'];?></td>
              <td>
                <?php if ($item['status']==='1') {  ?>
                  <span class="label label-success">Activo</span>
                <?php }else{ ?>
                  <span class="label label-danger">Inactivo</span>
                <?php } ?>
              </td>
							<td>
								<button class="btn btn-warning" onclick="edit_gerencia(<?php echo $item['id_gerencia'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
							</td>
						</tr>
					<?php } ?>
				</div>
			</div>	
		</div>
	</div>
</div>

<script>
	  $(document).ready( function () {
	    $('#tableUsers').DataTable();
	  } );

</script>

<script>
	function edit_gerencia(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('/MantenimientoRegistros/ajax_edit_gerencia')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        { 
            $('[name="id_gerencia"]').val(data.id_gerencia);
            $('[name="status"]').val(data.status);
            $('#nombre_gerencia').html(data.nombre_gerencia);
			$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function save()
    {
        url = "<?php echo site_url('/MantenimientoRegistros/gerencia_update')?>";
 
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

</script>

<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title"><span id="nombre_gerencia"></span></h3>
	      </div>
		        <form action="#" id="form" class="form-horizontal">
		           <input type="hidden" value="" name="id_gerencia"/> 
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


