<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández.
 * 2017
 * 
 */
class Gerencia_model extends CI_Model {
	public function __construct() {	
		parent::__construct();
		$this->load->database();
	}
	public function get_all_gerencias(){
		$result = $this->db->query('SELECT * FROM gerencias ORDER BY nombre_gerencia ASC');
		$gerencias = $result->result_array();
		return $gerencias;
	}
	//lista las gerencias
	public function get_gerencias(){
		$result = $this->db->query('SELECT * FROM gerencias WHERE status="1" ORDER BY nombre_gerencia ASC');
		$gerencias = $result->result_array();
		return $gerencias;
	}
	//obtiene nombre de gerencia por id
	public function get_gerencia_titulo($id_gerencia){
		$result = $this->db->query('SELECT nombre_gerencia FROM gerencias WHERE id_gerencia='.$id_gerencia);
		$gerencias = $result->result_array();
		return $gerencias;
	}
	//lista formatos por id de gerencia
	public function get_gerencia_formatos($slug_gerencia){
		$result = $this->db->query('SELECT *
									FROM formatos AS f
									INNER JOIN gerencias AS g ON f.fk_id_gerencia=g.id_gerencia
									WHERE g.slug_gerencia="'.$slug_gerencia.'"
									AND f.status="1"
									ORDER BY f.nombre_formato ASC');
		$formatos = $result->result_array();
		return $formatos;
	}

	public function get_formatos(){
		$result = $this->db->query('SELECT *
									FROM formatos f
									WHERE f.status="1"
									ORDER BY f.nombre_formato ASC');
		$formatos = $result->result_array();
		return $formatos;
	}

	public function get_all_formatos(){
		$result = $this->db->query('SELECT *
									FROM formatos f
									ORDER BY f.nombre_formato ASC');
		$formatos = $result->result_array();
		return $formatos;
	}

	public function get_info_by_id($id){
		$this->db->from('gerencias');
		$this->db->where('id_gerencia',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function gerencia_update($where, $data){
		$this->db->update('gerencias', $data, $where);
		return $this->db->affected_rows();
	}

	
}
