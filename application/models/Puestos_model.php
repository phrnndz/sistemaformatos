<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández.
 * 2017
 * 
 */
class Puestos_model extends CI_Model {
	public function __construct() {	
		parent::__construct();
		$this->load->database();

	}
	public function get_nombre_de_directivos(){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->order_by('titulo_interno_usuario', 'ASC');
		$result = $this->db->get();
		$personal = $result->result_array();
		return $personal;
	}

	public function get_puestos(){
		$this->db->select('*');
		$this->db->from('puestos');
		$this->db->order_by('clave_puesto', 'ASC');
		$result = $this->db->get();
		$roles = $result->result_array();
		return $roles;
	}

	public function get_nombre_directivo_por_clave($pk_clave_usuario){
		$this->db->select('titulo_interno_usuario');
		$this->db->from('usuarios');
		$this->db->where('pk_clave_usuario', $pk_clave_usuario);
		$result = $this->db->get();
		$directivo = $result->result_array();
		return $directivo;
	}



	// CRUD DE MANTENIMIENTO DE REGISTROS
	public function get_all_users(){
		$this->db->from('puestos');
		$result= $this->db->get();
		$puestos = $result->result_array();
		return $puestos;
	}
	public function puesto_add($data){
		$this->db->insert('puestos', $data);
		return $this->db->insert_id();
	}

	public function get_info_by_id($id){
		$this->db->from('puestos');
		$this->db->where('id_puesto',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function puesto_update($where, $data){
		$this->db->update('puestos', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id){
		$this->db->where('id_puesto', $id);
		$this->db->delete('puestos');
	}

}

