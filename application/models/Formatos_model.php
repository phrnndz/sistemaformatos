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

	public function actualizaSolicitud($data){
		$status = $data['datos']['status'];
		$id_historial_formatos = (int)$data['datos']['idSolicitud'];
		$query = array(
				'id_historial_formatos' => $id_historial_formatos ,
				'status' 				=> 	$status
				);
		$this->db->where('id_historial_formatos', $id_historial_formatos);
    	$this->db->update('historial_formatos', $query);
	}
}
