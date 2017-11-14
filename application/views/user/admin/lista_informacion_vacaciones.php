				<div class="row">
					
				</div>
				
        <div class="row">
					<table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th rowspan="2">Badgenumber</th>
              <th rowspan="2">Nombre</th>
              <th colspan="2" >Permiso 1 (2 dias máximo)</th>
              <th colspan="2" >Permiso 2 (2 dias máximo)</th>
              <th colspan="2" >Vacaciones 1</th>
              <th colspan="2" >Vacaciones 2</th>
              <th colspan="2" >Vacaciones 3</th>
              <th>Antiguedad</th>
              <th>Acciones</th>
						</tr>
						</thead>
						<tbody>
            <tr>
              <td></td>
              <td></td>
              <td><strong>Inicia </strong> </td>
              <td><strong>Termina </strong></td>
              <td><strong>Inicia </strong> </td>
              <td><strong>Termina </strong></td>
              <td><strong>Inicia </strong> </td>
              <td><strong>Termina </strong></td>
              <td><strong>Inicia </strong> </td>
              <td><strong>Termina </strong></td>
              <td><strong>Inicia </strong> </td>
              <td><strong>Termina </strong></td>
              <td></td>
              <td></td>
            </tr>
          <?php  foreach ($vacaciones as $item) { ?>
            <tr>
              <td><?php echo $item['badgenumber']; ?></td>
              <td><?php echo $item['nombre_usuario']; ?> </td>
              <td> <small> <?php echo $item['permiso_periodo_1_inicio'];?> </small></td>
              <td> <small> <?php echo $item['permiso_periodo_1_termino'];?> </small></td>
              <td> <small> <?php echo $item['permiso_periodo_2_inicio'];?> </small></td>
              <td> <small> <?php echo $item['permiso_periodo_2_termino'];?> </small></td>

              <td> <small> <?php echo $item['vacaciones_periodo_1_inicio'];?> </small></td>
              <td> <small> <?php echo $item['vacaciones_periodo_1_termino'];?> </small></td>
              <td> <small> <?php echo $item['vacaciones_periodo_2_inicio'];?> </small></td>
              <td> <small> <?php echo $item['vacaciones_periodo_2_termino'];?> </small></td>
              <td> <small> <?php echo $item['vacaciones_periodo_3_inicio'];?> </small></td>
              <td> <small> <?php echo $item['vacaciones_periodo_3_termino'];?> </small> </td>
              <td><?php echo $item['anios_antiguedad']; ?> años</td>
              <td>
                <button class="btn btn-warning" onclick="edit_vacacaciones(<?php echo $item['badgenumber'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
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

    function edit_vacacaciones(id)
    {
      $('#form')[0].reset(); // reset form on modals
      var flag=false;
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('/MantenimientoRegistros/ajax_edit_vacaciones')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // JSON.stringify(data);
            $('[name="badgenumber"]').val(data.badgenumber);
            $('[name="periodo_1_inicio"]').val(data.vacaciones_periodo_1_inicio);
            $('[name="periodo_1_termino"]').val(data.vacaciones_periodo_1_termino);
            var flag= validaEditable(data.vacaciones_periodo_1_inicio,data.vacaciones_periodo_1_termino);
            if(flag===true){
              $('[name="periodo_1_inicio"]').prop('readonly', true);
              $('[name="periodo_1_termino"]').prop('readonly', true);
            
            }
            var dias1=data.diasUsados1-data.domingos1;
            $('#diasUsados1').html(dias1+' dias usados');





            $('[name="periodo_2_inicio"]').val(data.vacaciones_periodo_2_inicio);
            $('[name="periodo_2_termino"]').val(data.vacaciones_periodo_2_termino);
            var flag= validaEditable(data.vacaciones_periodo_2_inicio,data.vacaciones_periodo_2_termino);
            if(flag===true){
              $('[name="periodo_2_inicio"]').prop('readonly', true);
              $('[name="periodo_2_termino"]').prop('readonly', true);
             
            }
            var dias2=data.diasUsados2-data.domingos2;
            $('#diasUsados2').html(dias2+' dias usados');




            $('[name="periodo_3_inicio"]').val(data.vacaciones_periodo_3_inicio);
            $('[name="periodo_3_termino"]').val(data.vacaciones_periodo_3_termino);
            var flag= validaEditable(data.vacaciones_periodo_3_inicio,data.vacaciones_periodo_3_termino);
            if(flag===true){
              $('[name="periodo_3_inicio"]').prop('readonly', true);
              $('[name="periodo_3_termino"]').prop('readonly', true);
             
            }
            var dias3=data.diasUsados3-data.domingos3;
            $('#diasUsados3').html(dias3+' dias usados');



            $('#diasLey').html(data.diasLey);
            var diasUsadosTotal= dias1+dias2+dias3;
            var diasLibres=data.diasLey-diasUsadosTotal;
            $('#diasLibres').html(diasLibres);
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text(data.nombre_usuario); // Set title to Bootstrap modal title
 
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
      url = "<?php echo site_url('/MantenimientoRegistros/vacaciones_update')?>";
 
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
               alert('Guardado');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function validaEditable(inicio,termino){
      if(inicio==='1900-01-00' &&  termino==='1900-01-00'){
        return false;
      }else{
        return true;
      }
    }

  </script>

  <script>
    $(document).ready( function () {
      $('#tableUsers').DataTable();
    });

  </script>
  

 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Modificar periodos</h3>
          <p>A este usuario le corresponden por ley <strong><span id="diasLey"></span></strong> dias de vacaciones</p>
          <p>Faltan por usar <strong><span id="diasLibres"></span></strong> dias </p>
        </div>
          
        <form action="#" id="form" class="form-horizontal">
           <input type="hidden" value="" name="badgenumber"/> 
              <div class="row">
                <div class="form-group">
                  <label class="control-label col-md-3">Periodo 1</label>
                  <div class="col-md-3">
                    <input name="periodo_1_inicio" id="periodo_1_inicio" data-language="en" placeholder="00/00/00" class="form-control calendario" type="text">
                  </div>
                  <div class="col-md-3">
                    <input name="periodo_1_termino" id="periodo_1_termino" data-language="en" placeholder="00/00/00" class="form-control calendario" type="text">
                  </div>
                  <div class="col-md-3">
                    <p id="diasUsados1"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label class="control-label col-md-3">Periodo 2</label>
                  <div class="col-md-3">
                    <input name="periodo_2_inicio" id="periodo_2_inicio" data-language="en" placeholder="00/00/00" class="form-control calendario" type="text">
                  </div>
                  <div class="col-md-3">
                    <input name="periodo_2_termino" id="periodo_2_termino" data-language="en" placeholder="00/00/00" class="form-control calendario" type="text">
                  </div>
                  <div class="col-md-3">
                    <p id="diasUsados2"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label class="control-label col-md-3">Periodo 3</label>
                  <div class="col-md-3">
                    <input name="periodo_3_inicio" id="periodo_3_inicio" data-language="en" placeholder="00/00/00" class="form-control calendario" type="text">
                  </div>
                  <div class="col-md-3">
                    <input name="periodo_3_termino" id="periodo_3_termino" data-language="en" placeholder="00/00/00" class="form-control calendario" type="text">
                  </div>
                  <div class="col-md-3">
                    <p id="diasUsados3"></p>
                  </div>
                </div>
              </div>
        </form>
     
           <div class="row">
              <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
           </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->