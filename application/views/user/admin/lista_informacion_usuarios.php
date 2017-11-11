
				<div class="row">
				<!--   <button class="btn" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i>Nuevo Usuario</button> -->
				</div>
				<div class="row">
					<table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
									<th>ID</th>
									<th>Nombre</th>
									<th>Titulo</th>
									<th>Fecha Ingreso</th>
									<th>Fecha Contrato</th>
                  <th>Puesto</th>
									<th>Nombre Interno</th>
									<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
					<?php  foreach ($usuarios as $item) { ?>
 						<tr>
							<td><?php echo $item['badgenumber'];?></td>
							<td><?php echo $item['nombre_usuario'];?></td>
							<td><?php echo $item['titulo_usuario'];?></td>
							<td><?php echo $item['ingreso_usuario'];?></td>
							<td><?php echo $item['fecha_contratacion'];?></td>
							<td><?php echo $item['clave_puesto'];?></td>
							<td><?php echo $item['titulo_interno_usuario'];?></td>
							<!-- <td><?php // echo $item['iniciales_usuario'];?></td>
							<td><?php // echo $item['clave_usuario'];?></td>
							<td><?php // echo $item['area_usuario'];?></td> -->
							<td>
								<button class="btn btn-warning" onclick="edit_user(<?php echo $item['badgenumber'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
								<button class="btn btn-danger" onclick="delete_user(<?php echo $item['badgenumber'];?>)"><i class="glyphicon glyphicon-remove"></i></button>
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
    } );

</script>


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
 
            $('[name="badgenumber"]').val(data.badgenumber);
            $('[name="nombre_usuario"]').val(data.nombre_usuario);
            $('[name="titulo_usuario"]').val(data.titulo_usuario);
            $('[name="area_usuario"]').val(data.area_usuario);
            $('[name="ingreso_usuario"]').val(data.ingreso_usuario);
            $('[name="fecha_contratacion"]').val(data.fecha_contratacion);
            $('[name="titulo_interno_usuario"]').val(data.titulo_interno_usuario);
            $('[name="iniciales_usuario"]').val(data.iniciales_usuario);
            $('[name="clave_usuario"]').val(data.clave_usuario);
            $('[name="area_usuario"]').val(data.area_usuario); 
            //nuevos campos
            $('[name="anios_antiguedad"]').val(data.anios_antiguedad);
            $('[name="dias_por_ley"]').val(data.dias_por_ley);
            $('[name="dias_usados"]').val(data.dias_usados);
            $('[name="dias_por_usar"]').val(data.dias_por_usar);
            $('[name="estatus_prima_vacacional"]').val(data.estatus_prima_vacacional);
            $('[name="fecha_pago_prima_vacacional"]').val(data.fecha_pago_prima_vacacional);
          //  $('[name="badgenumber"]').val(data.badgenumber);


 
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
      //  console.log('hasta aqui todo bien el pedo es despues');
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
                alert('Error adding / update data save metodo');
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
	        <h3 class="modal-title">Nuevo Usuario</h3>
	      </div>
        <form action="#" id="form" class="form-horizontal">
           <input type="hidden" value="" name="badgenumber"/> 
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
              <label class="control-label col-md-3">Area Usuario</label>
              <div class="col-md-9">
				        <input name="area_usuario" placeholder="Area Usuario" class="form-control" type="text">
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
				        <input name="fecha_contratacion" placeholder="Contrato Usuario" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nombre Interno</label>
              <div class="col-md-9">
				        <input name="titulo_interno_usuario" placeholder="Nombre Interno" class="form-control" type="text">
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
            
            <div class="form-group">
              <label class="control-label col-md-3">Años de antigedad</label>
              <div class="col-md-9">
                <input name="anios_antiguedad" placeholder="Años de antigedad" class="form-control" type="number">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Dias por ley</label>
              <div class="col-md-9">
              <input name="dias_por_ley" placeholder="Dias por ley" class="form-control" type="number">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Dias usados</label>
              <div class="col-md-9">
              <input name="dias_usados" placeholder="Dias usados" class="form-control" type="number">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Dias por usar</label>
              <div class="col-md-9">
              <input name="dias_por_usar" placeholder="Dias por usar" class="form-control" type="text">
              </div>
            </div>
            
            <div class="form-group">
              <label for="checkbox" class="col-sm-4 control-label">Prima vacacional</label>
              <div class="col-sm-8">
                <div class="checkbox-inline">
                  <label><input type="radio" name="estatus_prima_vacacional" value="V">
                      Pagada
                  </label>
                </div>
                <div class="checkbox-inline">
                  <label><input type="radio" name="estatus_prima_vacacional" value="F">
                      No pagada
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Fecha prima vacacional</label>
              <div class="col-md-9">
              <input name="fecha_pago_prima_vacacional" placeholder="Fecha prima vacacional" class="form-control" type="text">
              </div>
            </div>

        </form>
     
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->