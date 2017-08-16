<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández
 * 
 * @extends CI_Controller
 */
class MantenimientoRegistros extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->model('gerencia_model');
		$this->load->model('puestos_model');


	}
	
	
	public function index() {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			if ($_SESSION['clave_usuario'] =='GDHO') {
				$this->load->view('header');
				$datos['usuarios'] = $this->user_model->get_all_users();
				$this->load->view('user/admin/lista_informacion_usuarios.php', $datos);
				$this->load->view('footer');
			}
		} else {
			redirect('/login');
		}
	}

	public function user_add(){
		$data = array(
				'pk_clave_usuario' => $this->input->post('pk_clave_usuario'),
				'nombre_usuario' => $this->input->post('nombre_usuario'),
				'titulo_usuario' => $this->input->post('titulo_usuario'),
				'unidad_usuario' => $this->input->post('unidad_usuario'),
				'ingreso_usuario' => $this->input->post('ingreso_usuario'),
				'contrato_usuario' => $this->input->post('contrato_usuario'),
				'puesto_nombre_oficial' => $this->input->post('puesto_nombre_oficial'),
				'nombre_interno_usuario' => $this->input->post('nombre_interno_usuario'),
				'iniciales_usuario' => $this->input->post('iniciales_usuario'),
				'clave_usuario' => $this->input->post('clave_usuario'),
				'area_usuario' => $this->input->post('area_usuario'),
			);
		$insert = $this->user_model->user_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id){
		$data = $this->user_model->get_info_by_id($id);
		echo json_encode($data);
	}

	public function user_update(){
		$data = array(
				'pk_clave_usuario' => $this->input->post('pk_clave_usuario'),
				'nombre_usuario' => $this->input->post('nombre_usuario'),
				'titulo_usuario' => $this->input->post('titulo_usuario'),
				'unidad_usuario' => $this->input->post('unidad_usuario'),
				'ingreso_usuario' => $this->input->post('ingreso_usuario'),
				'contrato_usuario' => $this->input->post('contrato_usuario'),
				'puesto_nombre_oficial' => $this->input->post('puesto_nombre_oficial'),
				'nombre_interno_usuario' => $this->input->post('nombre_interno_usuario'),
				'iniciales_usuario' => $this->input->post('iniciales_usuario'),
				'clave_usuario' => $this->input->post('clave_usuario'),
				'area_usuario' => $this->input->post('area_usuario'),
			);
		$this->user_model->user_update(array('id_usuario' => $this->input->post('id_usuario')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function user_delete($id)
	{
		$this->user_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function formatos(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			if ($_SESSION['clave_usuario'] =='GDHO') {
				$this->load->view('header');
				$datos['formatos'] = $this->gerencia_model->get_formatos();
				$this->load->view('user/admin/lista_informacion_formatos.php', $datos);
				$this->load->view('footer');
			}
		} else {
			redirect('/login');
		}
	}


	public function gerencias(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			if ($_SESSION['clave_usuario'] =='GDHO') {
				$this->load->view('header');
				$datos['gerencias'] = $this->gerencia_model->get_gerencias();
				$this->load->view('user/admin/lista_informacion_gerencias.php', $datos);
				$this->load->view('footer');
			}
		} else {
			redirect('/login');
		}
	}


	public function puestos(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			if ($_SESSION['clave_usuario'] =='GDHO') {
				$this->load->view('header');
				$datos['gerencias'] = $this->puestos_model->get_puestos();
				$this->load->view('user/admin/lista_informacion_puestos.php', $datos);
				$this->load->view('footer');
			}
		} else {
			redirect('/login');
		}
	}


}
