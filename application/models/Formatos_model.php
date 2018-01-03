<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández.
 * 2017
 * 
 */
class Formatos_model extends CI_Model {
	public function __construct() {	
		parent::__construct();
		$this->load->database();
	}
	//guarda el historial
	public function guarda_historial($query){
		$this->db->insert('historial_formatos', $query); 
	}

	public function get_solicitudes($clave_destino){
		$result = $this->db->query('SELECT FO.nombre_formato as nombre_formato ,HIS.*
									FROM historial_formatos HIS
									INNER JOIN formatos FO ON HIS.slug_formato=FO.slug_formato
									WHERE HIS.primera_autorizacion_clave_destino="'.$clave_destino.'" AND HIS.primera_autorizacion_status="P"');
		$solicitudes = $result->result_array();
		return $solicitudes;
	}

	public function get_solicitudes_dho($clave_destino){
		$result = $this->db->query('SELECT FO.nombre_formato as nombre_formato ,HIS.*
									FROM historial_formatos HIS
									INNER JOIN formatos FO ON HIS.slug_formato=FO.slug_formato
									WHERE HIS.segunda_autorizacion_clave_destino="'.$clave_destino.'" AND HIS.segunda_autorizacion_status="P"');
		$solicitudes = $result->result_array();
		return $solicitudes;
	}

	
	public function get_detalle_solicitud($id_solicitud){
		$query = $this->db->query('SELECT * FROM historial_formatos WHERE id_historial_formatos='.$id_solicitud);
		$query1 = $query->row();
		return $query1;	
	}

	public function get_historial_por_usuario($clave_usuario){
		$result = $this->db->query('SELECT FO.nombre_formato as nombre_formato ,HIS.*
									FROM historial_formatos HIS
									INNER JOIN formatos FO ON HIS.slug_formato=FO.slug_formato
									WHERE HIS.clave_remitente="'.$clave_usuario.'" 
									OR HIS.primera_autorizacion_clave_destino="'.$clave_usuario.'"');
		$historial = $result->result_array();
		return $historial;
	}


	public function actualizaSolicitud($query, $id_historial_formatos){
		$this->db->where('id_historial_formatos', $id_historial_formatos);
    	$this->db->update('historial_formatos', $query);
	}

	public function get_info_by_id($id){
		$this->db->from('formatos');
		$this->db->where('id_formato',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function formato_update($where, $data){
		$this->db->update('formatos', $data, $where);
		return $this->db->affected_rows();
	}

	public function consultar_segunda_autorizacion($formatoRequisitado){
		$query = $this->db->query('SELECT * FROM formatos WHERE slug_formato="'.$formatoRequisitado.'"');
		$query1 = $query->row();
		return $query1;	
	}

	public function obtiene_datos_dho(){
		$query = $this->db->query('SELECT badgenumber,id_puesto,titulo_interno_usuario FROM new_usuarios WHERE clave_usuario="GDHO"');
		$query1 = $query->row();
		return $query1;	
	}

}
