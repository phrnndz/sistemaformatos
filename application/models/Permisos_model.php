<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández.
 * 2017
 * 
 */
class Permisos_model extends CI_Model {
	public function __construct() {	
		parent::__construct();
		$this->load->database();
	}

	public function get_permisos(){
		$this->db->select('*');
		$this->db->from('permisos');
		$result = $this->db->get();
		$permisos = $result->result_array();
		return $permisos;
	}

	//CRUD MATENIMIENTO DE REGISTROS
	public function get_diasfestivos(){
		$this->db->select('*');
		$this->db->from('DIASFESTIVOS');
		$this->db->order_by('id_diafestivo', 'DESC');
		$result = $this->db->get();
		$festivos= $result->result_array();
		return $festivos;
	}

	public function diaferiado_add($data){
		$this->db->insert('DIASFESTIVOS', $data);
		return $this->db->insert_id();
	}

	public function delete_by_id($id){
		$this->db->where('id_diafestivo', $id);
		$this->db->delete('DIASFESTIVOS');
	}


	
}

