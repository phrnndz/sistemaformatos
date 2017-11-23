<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if (! function_exists('valida_insertar_permisos')) {
	
	function valida_insertar_permisos($formatoRequisitado,$data){
		$ci =& get_instance();
			//INICIA guardado de datos exclusivo de formato permiso a cuenta de vacaciones
				if ($formatoRequisitado== 'permiso_a_cuenta_de_vacaciones_2017') {
					$badgenumber = intval($data['datos']['claveRemitente']);
					$datos['infoPermisos'] = $ci->vacaciones_model->consulta_permisos($badgenumber);
					if (empty($datos['infoPermisos']->permiso_periodo_1_inicio) && empty($datos['infoPermisos']->permiso_periodo_1_termino)) {
						if ($data['datos']['permisoPeriodo2']=="") {
						$dataFecha= array(
							'permiso_periodo_1_inicio'	=>	$data['datos']['permisoPeriodo1'],
							'permiso_periodo_1_termino'	=>	$data['datos']['permisoPeriodo1']
							);
						}else{
							$dataFecha= array(
								'permiso_periodo_1_inicio'	=>	$data['datos']['permisoPeriodo1'],
								'permiso_periodo_1_termino'	=>	$data['datos']['permisoPeriodo2']
							);
						}
					}else{
						if ($data['datos']['permisoPeriodo2']=="") {
						$dataFecha= array(
							'permiso_periodo_2_inicio'	=>	$data['datos']['permisoPeriodo1'],
							'permiso_periodo_2_termino'	=>	$data['datos']['permisoPeriodo1']
							);
						}else{
							$dataFecha= array(
								'permiso_periodo_2_inicio'	=>	$data['datos']['permisoPeriodo1'],
								'permiso_periodo_2_termino'	=>	$data['datos']['permisoPeriodo2']
							);
						}
					}
					
					$ci->vacaciones_model->guarda_permisos($badgenumber,$dataFecha);
				}
				//TERMINA guardado de datos exclusivo de formato permiso a cuenta de vacaciones

	}

}




 ?>