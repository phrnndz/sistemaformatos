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
									,NU.periodo_1_inicio
							        ,NU.periodo_1_termino
									,NU.periodo_2_inicio
							        ,NU.periodo_2_termino
							        ,NU.periodo_3_inicio
							        ,NU.periodo_3_termino
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
		$query = $this->db->query(	'SELECT NU.badgenumber
										,NU.nombre_usuario
										,NU.periodo_1_inicio
								        ,NU.periodo_1_termino
										,IF(NU.periodo_1_inicio="1900-01-01" AND NU.periodo_1_termino="1900-01-01","0",IFNULL(datediff(NU.periodo_1_termino,NU.periodo_1_inicio)+1, "0")) as diasUsados1
										,ROUND(((unix_timestamp(NU.periodo_1_termino) - unix_timestamp(periodo_1_inicio) ) /(24*60*60)-7+WEEKDAY(periodo_1_inicio)-WEEKDAY(NU.periodo_1_termino))/7)
										 + if(WEEKDAY(periodo_1_inicio) <= 6, 1, 0)
										 + if(WEEKDAY(NU.periodo_1_termino) >= 6, 1, 0) as domingos1
	                                    ,NU.periodo_2_inicio
								        ,NU.periodo_2_termino
										,IF(NU.periodo_2_inicio="1900-01-01" AND NU.periodo_2_termino="1900-01-01","0",IFNULL(datediff(NU.periodo_2_termino,NU.periodo_2_inicio)+1, "0")) as diasUsados2
	                                    ,ROUND(((unix_timestamp(NU.periodo_2_termino) - unix_timestamp(periodo_2_inicio) ) /(24*60*60)-7+WEEKDAY(periodo_2_inicio)-WEEKDAY(NU.periodo_2_termino))/7)
										 + if(WEEKDAY(periodo_2_inicio) <= 6, 1, 0)
										 + if(WEEKDAY(NU.periodo_2_termino) >= 6, 1, 0) as domingos2
								        ,NU.periodo_3_inicio
								        ,NU.periodo_3_termino
	                                    ,IF(NU.periodo_3_inicio="1900-01-01" AND NU.periodo_3_termino="1900-01-01","0",IFNULL(datediff(NU.periodo_3_termino,NU.periodo_3_inicio)+1, "0")) as diasUsados3
										,ROUND(((unix_timestamp(NU.periodo_3_termino) - unix_timestamp(periodo_3_inicio) ) /(24*60*60)-7+WEEKDAY(periodo_3_inicio)-WEEKDAY(NU.periodo_3_termino))/7)
										 + if(WEEKDAY(periodo_3_inicio) <= 6, 1, 0)
										 + if(WEEKDAY(NU.periodo_3_termino) >= 6, 1, 0) as domingos3
								        ,NU.anios_antiguedad
								        ,V.dias as diasLey
									FROM new_usuarios NU
									JOIN vacaciones V on NU.anios_antiguedad=V.anios_antiguedad
									WHERE NU.badgenumber='.$id							
									);
		return $query->row();
	}

	public function Vacaciones_update($where, $data){
		$this->db->update('new_usuarios', $data, $where);
		return $this->db->affected_rows();
	}
}

