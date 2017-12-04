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
	//capta personal de DHO
	public function get_dho(){
		$result = $this->db->query('SELECT 
										NU.badgenumber as badgenumber_jefe,
										U.position_id,
										NU.titulo_interno_usuario as titulo_interno_usuario_jefe,
										NU.id_puesto as id_puesto_jefe,
										P.clave_puesto as clave_puesto_jefe
									FROM userinfo U 
									JOIN new_usuarios NU on U.badgenumber=NU.badgenumber
									JOIN puestos P 	ON NU.id_puesto = P.id_puesto
									WHERE P.nombre_puesto="GDHO"');
		$user = $result->result_array();
		return $user;
	}
	
	public function resolve_user_login($username, $userpassword) {
		$this->db->select('new_password');
		$this->db->from('userinfo');
		$this->db->where('badgenumber', $username);
		$password = $this->db->get()->row('new_password');
		return $this->verifica_passwoord($password, $userpassword);
		
	}
	
	public function get_user($badgenumber) {
		$result = $this->db->query('SELECT 
										U.badgenumber,
										U.position_id as id_sucursal,
										NU.*,
										P.clave_puesto,
										P.nombre_puesto,
										P.jefe_puesto as jefe_puesto,
										P2.id_puesto as id_puesto_jefe,
										P2.clave_puesto as puesto_jefe
									FROM userinfo U 
									JOIN new_usuarios NU 	ON U.badgenumber=NU.badgenumber
									JOIN puestos P 			ON NU.id_puesto = P.id_puesto
									JOIN puestos P2 		ON P.jefe_puesto=P2.nombre_puesto
									WHERE U.badgenumber="'.$badgenumber.'"');
		$user = $result->result_array();
		return $user;
	}

	public function get_jefe_inmediato($id_puesto_jefe, $id_sucursal){
		$result = $this->db->query('SELECT 
										NU.badgenumber as badgenumber_jefe,
										U.position_id,
										SUC.name,
										NU.titulo_interno_usuario as titulo_interno_usuario_jefe,
										NU.id_puesto as id_puesto_jefe,
										P.clave_puesto as clave_puesto_jefe
									FROM userinfo U 
									JOIN new_usuarios NU on U.badgenumber=NU.badgenumber
									JOIN puestos P 	ON NU.id_puesto = P.id_puesto
									JOIN personnel_positions SUC ON U.position_id= SUC.id
									WHERE U.position_id='.$id_sucursal.'
									AND NU.id_puesto='.$id_puesto_jefe);
		$jefeinmediato = $result->result_array();
		return $jefeinmediato;

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


	//BUSQUEDA EN LOGIN
	public function get_badgenumber_by_search($nombre){
		$result= $this->db->query('	SELECT name, lastname, badgenumber
									FROM userinfo  
									WHERE 
									name like "%'.$nombre.'%"');
		$usuarios = $result->result_array();
		return $usuarios;
	}

}

