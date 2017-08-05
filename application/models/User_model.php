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
		$this->db->from('users');
		$this->db->where('username', $username);
		$password = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $userpassword);
		
	}
	
	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}

	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	private function verify_password_hash($password, $userpassword) {
		
		if ($password === $userpassword) {
			return true;
		}else{
			return false;
		}
		
	}
	
}
