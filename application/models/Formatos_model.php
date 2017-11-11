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
		//return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function get_solicitudes($clave_destino){
		$result = $this->db->query('SELECT * FROM historial_formatos WHERE clave_destino="'.$clave_destino.'" AND status="P"');
		$solicitudes = $result->result_array();
		return $solicitudes;
	}

	public function get_solicitudes_usuario_aceptadas($clave_remitente){
		$result = $this->db->query('SELECT * FROM historial_formatos WHERE clave_remitente="'.$clave_remitente.'" AND status="A"');
		$solicitudesAcep = $result->result_array();
		return $solicitudesAcep;		
	}

	public function get_solicitudes_usuario_pendientes($clave_remitente){
		$result = $this->db->query('SELECT * FROM historial_formatos WHERE clave_remitente="'.$clave_remitente.'" AND status="P"');
		$solicitudesPend = $result->result_array();
		return $solicitudesPend;		
	}

	public function get_solicitudes_usuario_rechazadas($clave_remitente){
		$result = $this->db->query('SELECT * FROM historial_formatos WHERE clave_remitente="'.$clave_remitente.'" AND status="R"');
		$solicitudesRech = $result->result_array();
		return $solicitudesRech;		
	}
	
	public function get_detalle_solicitud($id_solicitud){
		$this->db->from('historial_formatos');
		$this->db->where('id_historial_formatos', $id_solicitud);
		$result = $this->db->get();
		$solicitud = $result->result_array();
		return $solicitud;
	}

	public function get_historial_por_usuario($clave_usuario){
		$result = $this->db->query('	SELECT * FROM historial_formatos 
							WHERE clave_remitente="'.$clave_usuario.'" 
							OR clave_destino="'.$clave_usuario.'"');
		$historial = $result->result_array();
		return $historial;
	}


	public function actualizaSolicitud($data){
		$id_historial_formatos 	= (int)$data['datos']['idSolicitud'];
		$status 				= $data['datos']['status'];
		$comentario_revisor 	= $data['datos']['comentario_revisor'];
		$query = array(
				'id_historial_formatos' => $id_historial_formatos ,
				'status' 				=> 	$status,
				'comentario_revisor' 	=> 	$comentario_revisor
				);
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

}
