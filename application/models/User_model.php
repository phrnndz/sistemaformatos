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
		$this->db->select('new_password');
		$this->db->from('userinfo');
		$this->db->where('badgenumber', $username);
		$password = $this->db->get()->row('new_password');
		return $this->verifica_passwoord($password, $userpassword);
		
	}
	
	/*public function get_user_id_from_username($username) {
		$this->db->select('badgenumber');
		$this->db->from('userinfo');
		$this->db->where('pk_clave_usuario', $username);
		return $this->db->get()->row('id_usuario');
	}
*/
	public function get_user($badgenumber) {
		$result = $this->db->query('SELECT *
									FROM userinfo U 
									JOIN new_usuarios NU ON U.badgenumber=NU.badgenumber
									JOIN puestos P ON NU.id_puesto = P.id_puesto
									WHERE U.badgenumber="'.$badgenumber.'"');
		$user = $result->result_array();
		return $user;
	}

	private function verifica_passwoord($password, $userpassword) {	
		if ($password === $userpassword) {
			return true;
		}else{
			return false;
		}
	}

/*	public function get_nombre_por_id($id){
		
	}

	public function get_nombre_puesto_por_id($id){

	}*/


	// CRUD DE MANTENIMIENTO DE REGISTROS
	public function get_all_users(){
		$result= $this->db->query('	SELECT * 
									FROM userinfo U 
									JOIN new_usuarios NU ON U.badgenumber=NU.badgenumber
									JOIN puestos P 
									ON NU.id_puesto = P.id_puesto');
		$usuarios = $result->result_array();
		return $usuarios;
	}
	public function user_add($data){
		$this->db->insert('usuarios', $data);
		return $this->db->insert_id();
	}

	public function get_info_by_id($id){
		$this->db->from('new_usuarios');
		$this->db->where('badgenumber',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function user_update($where, $data){
		$this->db->update('new_usuarios', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id){
		$this->db->where('badgenumber', $id);
		$this->db->delete('new_usuarios');
	}
}

