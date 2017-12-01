        <div class="row">
              <button class="btn" onclick="add_dia()"><i class="glyphicon glyphicon-plus"></i>Nuevo día</button>
            </div>
				<div class="row">
					<table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
									<th>Fecha</th>
                  <th>Dia Feriado</th>
                  <th>Acciones</th>
						</tr>
						</thead>
						<tbody>
					<?php  foreach ($diasferiados as $dia) { ?>
 						<tr>
							<td><?php echo $dia['Fecha'];?></td>
							<td><?php echo $dia['Descripcion'];?></td>
              <td>
                 <button class="btn btn-danger" onclick="delete_diafestivo(<?php echo $dia['id_diafestivo'];?>)"><i class="glyphicon glyphicon-remove"></i></button>
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
      $('#tableUsers').DataTable( {
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "No se ha encontrado nada",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se ha encontrado nada",
            "infoFiltered": "(filtrando de un total de _MAX_ )",
            "search": "Buscar"
        }
      }
      );
    
    $('#fechaDiaFestivo').datepicker({
      minDate: new Date(),
      dateFormat: 'yyyy-mm-dd',
    });


    } );

</script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#tableUsers').DataTable();
  } );
    var save_method; //for save method string
    var table;
 
 
    function add_dia()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    }
  
    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('/MantenimientoRegistros/diaferiado_add')?>";
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
 
    function delete_diafestivo(id)
    {
      if(confirm('¿Está seguro de eliminar este día festivo?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('/MantenimientoRegistros/delete_diaferiado')?>/"+id,
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
          <h3 class="modal-title">Nuevo dia feriado</h3>
        </div>
        <form action="#" id="form" class="form-horizontal">
           <input type="hidden" value="" name="id_puesto"/> 
            <div class="form-group">
              <label class="control-label col-md-3">Fecha</label>
              <div class="col-md-9">
                <input name="Fecha" placeholder="Fecha" class="form-control" type="text" id="fechaDiaFestivo">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Descripción</label>
              <div class="col-md-9">
                <input name="Descripcion" placeholder="Descripción" class="form-control" type="text">
              </div>
            </div>
        </form>
     
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
