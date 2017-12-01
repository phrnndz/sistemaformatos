<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández.
 * 2017
 * 
 */
class Vacaciones_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function get_vacaciones() {
		$result = $this->db->query('SELECT 	
									NU.badgenumber
									,NU.nombre_usuario
									,NU.permiso_periodo_1_inicio
							        ,NU.permiso_periodo_1_termino
									,NU.permiso_periodo_2_inicio
							        ,NU.permiso_periodo_2_termino
									,NU.vacaciones_periodo_1_inicio
							        ,NU.vacaciones_periodo_1_termino
									,NU.vacaciones_periodo_2_inicio
							        ,NU.vacaciones_periodo_2_termino
							        ,NU.vacaciones_periodo_3_inicio
							        ,NU.vacaciones_periodo_3_termino
							        ,NU.anios_antiguedad
							        ,V.dias as dias
									FROM new_usuarios NU
									JOIN vacaciones V on NU.anios_antiguedad=V.anios_antiguedad								
									');
		$vacaciones = $result->result_array();
		return $vacaciones;
		
	}

	//OBTENER LOS DÍAS LABORALES
	public function get_info_by_id($id){
		$query = $this->db->query(	'SELECT
										NU.badgenumber as badgenumber
										,NU.nombre_usuario
										,IFNULL(NU.permiso_periodo_1_inicio,"0") AS permiso_periodo_1_inicio
										,IFNULL(NU.permiso_periodo_1_termino,"0") AS permiso_periodo_1_termino
										,IF(NU.permiso_periodo_1_inicio IS NULL AND NU.permiso_periodo_1_termino IS NULL,"0",IFNULL(datediff(NU.permiso_periodo_1_termino,NU.permiso_periodo_1_inicio)+1, "0")) as diasPermisoUsados1
										,IFNULL(NU.permiso_periodo_2_inicio,"0") AS permiso_periodo_2_inicio
										,IFNULL(NU.permiso_periodo_2_termino,"0") AS permiso_periodo_2_termino
										,IF(NU.permiso_periodo_2_inicio IS NULL AND NU.permiso_periodo_2_termino IS NULL,"0",IFNULL(datediff(NU.permiso_periodo_2_termino,NU.permiso_periodo_2_inicio)+1, "0")) as diasPermisoUsados2
									    ,IFNULL(NU.vacaciones_periodo_1_inicio,"0") AS vacaciones_periodo_1_inicio
									    ,IFNULL(NU.vacaciones_periodo_1_termino,"0") AS vacaciones_periodo_1_termino
										,IF(NU.vacaciones_periodo_1_inicio IS NULL AND NU.vacaciones_periodo_1_termino IS NULL,"0",IFNULL(datediff(NU.vacaciones_periodo_1_termino,NU.vacaciones_periodo_1_inicio)+1, "0")) as diasUsados1
										,IFNULL(ROUND(((unix_timestamp(NU.vacaciones_periodo_1_termino) - unix_timestamp(NU.vacaciones_periodo_1_inicio) ) /(24*60*60)-7+WEEKDAY(NU.vacaciones_periodo_1_inicio)-WEEKDAY(NU.vacaciones_periodo_1_termino))/7)
										 + IF(WEEKDAY(NU.vacaciones_periodo_1_inicio) <= 6, 1, 0)
										 + IF(WEEKDAY(NU.vacaciones_periodo_1_termino) >= 6, 1, 0),"0") as domingos1
										,calculaFestivos(NU.vacaciones_periodo_1_inicio,NU.vacaciones_periodo_1_termino) AS diasFestivos1
									    ,IFNULL(NU.vacaciones_periodo_2_inicio,"0") vacaciones_periodo_2_inicio
									    ,IFNULL(NU.vacaciones_periodo_2_termino,"0") vacaciones_periodo_2_termino
										,IF(NU.vacaciones_periodo_2_inicio IS NULL AND NU.vacaciones_periodo_2_termino IS NULL,"0",IFNULL(datediff(NU.vacaciones_periodo_2_termino,NU.vacaciones_periodo_2_inicio)+1, "0")) as diasUsados2
									    ,IFNULL(ROUND(((unix_timestamp(NU.vacaciones_periodo_2_termino) - unix_timestamp(NU.vacaciones_periodo_2_inicio) ) /(24*60*60)-7+WEEKDAY(NU.vacaciones_periodo_2_inicio)-WEEKDAY(NU.vacaciones_periodo_2_termino))/7)
										 + IF(WEEKDAY(NU.vacaciones_periodo_2_inicio) <= 6, 1, 0)
										 + IF(WEEKDAY(NU.vacaciones_periodo_2_termino) >= 6, 1, 0),"0") as domingos2
									    ,calculaFestivos(NU.vacaciones_periodo_2_inicio,NU.vacaciones_periodo_2_termino) AS diasFestivos2
									    ,IFNULL(NU.vacaciones_periodo_3_inicio,"0") vacaciones_periodo_3_inicio
									    ,IFNULL(NU.vacaciones_periodo_3_termino,"0") vacaciones_periodo_3_termino
									    ,IF(NU.vacaciones_periodo_3_inicio IS NULL AND NU.vacaciones_periodo_3_termino IS NULL,"0",IFNULL(datediff(NU.vacaciones_periodo_3_termino,NU.vacaciones_periodo_3_inicio)+1, "0")) as diasUsados3
										,IFNULL(ROUND(((unix_timestamp(NU.vacaciones_periodo_3_termino) - unix_timestamp(NU.vacaciones_periodo_3_inicio) ) /(24*60*60)-7+WEEKDAY(NU.vacaciones_periodo_3_inicio)-WEEKDAY(NU.vacaciones_periodo_3_termino))/7)
										 + IF(WEEKDAY(NU.vacaciones_periodo_3_inicio) <= 6, 1, 0)
										 + IF(WEEKDAY(NU.vacaciones_periodo_3_termino) >= 6, 1, 0),"0") as domingos3
										,calculaFestivos(NU.vacaciones_periodo_3_inicio,NU.vacaciones_periodo_3_termino) AS diasFestivos3
									    ,NU.anios_antiguedad
									    ,V.dias as diasLey
									FROM new_usuarios NU
									JOIN vacaciones V on NU.anios_antiguedad=V.anios_antiguedad
									WHERE NU.badgenumber='.$id);
		return $query->row();
	}



	public function Vacaciones_update($where, $data){
		$this->db->update('new_usuarios', $data, $where);
		return $this->db->affected_rows();
	}

	public function guarda_permisos($where,$data){
		$this->db->where('badgenumber', $where);
		$this->db->update('new_usuarios', $data);
		return $this->db->affected_rows();	
	}

	public function consulta_permisos($badgenumber){
		$query = $this->db->query('	SELECT 
									permiso_periodo_1_inicio
									,permiso_periodo_1_termino
									FROM
									new_usuarios
									WHERE
									badgenumber='.$badgenumber);
		return $query->row();
	}
}

