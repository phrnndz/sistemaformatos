<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández.
 * 2017
 * 
 */
class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function resolve_user_login($username, $userpassword) {
		$this->db->select('password');
		$this->db->from('usuarios');
		$this->db->where('pk_clave_usuario', $username);
		$password = $this->db->get()->row('password');
		return $this->verifica_passwoord($password, $userpassword);
		
	}
	
	public function get_user_id_from_username($username) {
		$this->db->select('id_usuario');
		$this->db->from('usuarios');
		$this->db->where('pk_clave_usuario', $username);
		return $this->db->get()->row('id_usuario');
	}

	public function get_user($user_id) {
		$this->db->from('usuarios');
		$this->db->where('id_usuario', $user_id);
		return $this->db->get()->row();
	}

	private function verifica_passwoord($password, $userpassword) {	
		if ($password === $userpassword) {
			return true;
		}else{
			return false;
		}
	}


	// CRUD DE MANTENIMIENTO DE REGISTROS
	public function get_all_users(){
		$this->db->from('usuarios');
		$result= $this->db->get();
		$usuarios = $result->result_array();
		return $usuarios;
	}
	public function user_add($data){
		$this->db->insert('usuarios', $data);
		return $this->db->insert_id();
	}

	public function get_info_by_id($id){
		$this->db->from('usuarios');
		$this->db->where('id_usuario',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function user_update($where, $data){
		$this->db->update('usuarios', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id){
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuarios');
	}
}

