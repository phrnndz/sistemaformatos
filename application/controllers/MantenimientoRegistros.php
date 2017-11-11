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
		$this->load->model('formatos_model');
		$this->load->model('vacaciones_model');
	}
	
	
	public function index() {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			
				$this->load->view('header');
				$datos['usuarios'] = $this->user_model->get_all_users();
				$datos['puestos'] = $this->puestos_model->get_puestos();
				$this->load->view('user/admin/header_lista_informacion.php');
				$this->load->view('user/admin/lista_informacion_usuarios.php', $datos);
				$this->load->view('footer');
			
		} else {
			redirect('/login');
		}
	}

	/**
	 * 
	 * USUARIOS
	 * 
	**/

	public function ajax_edit($id){
		$data = $this->user_model->get_info_by_id($id);
		echo json_encode($data);
	}


	public function user_update(){
			$data = array(
				'badgenumber' => $this->input->post('badgenumber'),
				'nombre_usuario' => $this->input->post('nombre_usuario'),
				'titulo_usuario' => $this->input->post('titulo_usuario'),
				'area_usuario' => $this->input->post('area_usuario'),
				'ingreso_usuario' => $this->input->post('ingreso_usuario'),
				'fecha_contratacion' => $this->input->post('fecha_contratacion'),
				'titulo_interno_usuario'=>$this->input->post('titulo_interno_usuario'),
				'iniciales_usuario' => $this->input->post('iniciales_usuario'),
				'clave_usuario' => $this->input->post('clave_usuario'),
				'area_usuario' => $this->input->post('area_usuario'),
				'anios_antiguedad' => $this->input->post('anios_antiguedad'),
				'dias_por_ley' => $this->input->post('dias_por_ley'),
				'dias_usados' => $this->input->post('dias_usados'),
				'dias_por_usar' => $this->input->post('dias_por_usar'),
				'estatus_prima_vacacional' => $this->input->post('estatus_prima_vacacional'),
				'fecha_pago_prima_vacacional' => $this->input->post('fecha_pago_prima_vacacional')

			);

		$this->user_model->user_update(array('badgenumber' => $this->input->post('badgenumber')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function user_delete($id)
	{
		$this->user_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	/**
	 * 
	 * FORMATOS
	 * 
	 */
	
	public function formatos(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			if ($_SESSION['clave_usuario'] =='GDHO') {
				$this->load->view('header');
				$datos['formatos'] = $this->gerencia_model->get_all_formatos();
				$this->load->view('user/admin/header_lista_informacion.php');
				$this->load->view('user/admin/lista_informacion_formatos.php', $datos);
				$this->load->view('footer');
			}
		} else {
			redirect('/login');
		}
	}

	public function ajax_edit_formato($id){
		$data = $this->formatos_model->get_info_by_id($id);
		echo json_encode($data);
	}

	public function formato_update(){
		$data = array(
				'id_formato' => $this->input->post('id_formato'),
				'status' => $this->input->post('status')
			);
		$this->formatos_model->formato_update(array('id_formato' => $this->input->post('id_formato')), $data);
		echo json_encode(array("status" => TRUE));
	}


	/**
	 * 
	 * GERENCIAS
	 * 
	 */

	public function gerencias(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			if ($_SESSION['clave_usuario'] =='GDHO') {
				$this->load->view('header');
				$datos['gerencias'] = $this->gerencia_model->get_all_gerencias();
				$this->load->view('user/admin/header_lista_informacion.php');
				$this->load->view('user/admin/lista_informacion_gerencias.php', $datos);
				$this->load->view('footer');
			}
		} else {
			redirect('/login');
		}
	}

	public function ajax_edit_gerencia($id){
		$data = $this->gerencia_model->get_info_by_id($id);
		echo json_encode($data);
	}

	public function gerencia_update(){
		$data = array(
				'id_gerencia' => $this->input->post('id_gerencia'),
				'status' => $this->input->post('status')
			);
		$this->gerencia_model->gerencia_update(array('id_gerencia' => $this->input->post('id_gerencia')), $data);
		echo json_encode(array("status" => TRUE));
	}



	/**
	 * 
	 * PUESTOS
	 * 
	 */

	public function puestos(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
			if ($_SESSION['clave_usuario'] =='GDHO') {
				$this->load->view('header');
				$datos['gerencias'] = $this->puestos_model->get_puestos();
				$this->load->view('user/admin/header_lista_informacion.php');
				$this->load->view('user/admin/lista_informacion_puestos.php', $datos);
				$this->load->view('footer');
			}
		} else {
			redirect('/login');
		}
	}


	public function puesto_add(){
		$data = array(
				'id_puesto' => $this->input->post('id_puesto'),
				'clave_puesto' => $this->input->post('clave_puesto'),
				'nombre_puesto' => $this->input->post('nombre_puesto'),
				'area_puesto' => $this->input->post('area_puesto'),
				'nivel_puesto' => $this->input->post('nivel_puesto'),
				'descripcion_nivel' => $this->input->post('descripcion_nivel'),
				'jefe_puesto' => $this->input->post('jefe_puesto'),
				'competencia_puesto' => $this->input->post('competencia_puesto'),
				'status' => $this->input->post('status')
			);
		$insert = $this->puestos_model->puesto_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit_puesto($id){
		$data = $this->puestos_model->get_info_by_id($id);
		echo json_encode($data);
	}


	public function puesto_update(){
		$data = array(
				'id_puesto' => $this->input->post('id_puesto'),
				'clave_puesto' => $this->input->post('clave_puesto'),
				'nombre_puesto' => $this->input->post('nombre_puesto'),
				'area_puesto' => $this->input->post('area_puesto'),
				'nivel_puesto' => $this->input->post('nivel_puesto'),
				'descripcion_nivel' => $this->input->post('descripcion_nivel'),
				'jefe_puesto' => $this->input->post('jefe_puesto'),
				'competencia_puesto' => $this->input->post('competencia_puesto'),
				'status' => $this->input->post('status')
			);
		$this->puestos_model->puesto_update(array('id_puesto' => $this->input->post('id_puesto')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function puesto_delete($id)
	{
		$this->puestos_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	/**
	 * 
	 * VACACIONES
	 * 
	 */

	public function vacaciones(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//MEnú Solo para DHO
				$this->load->view('header');
				$datos['vacaciones'] = $this->vacaciones_model->get_vacaciones();
				$this->load->view('user/admin/header_lista_informacion.php');
				$this->load->view('user/admin/lista_informacion_vacaciones.php', $datos);
				$this->load->view('footer');

		} else {
			redirect('/login');
		}
	}

	public function ajax_edit_vacaciones($id){
		$data = $this->vacaciones_model->get_info_by_id($id);
		echo json_encode($data);
	}

	public function vacaciones_update(){
		$data = array(
				'badgenumber' => $this->input->post('badgenumber'),
				'periodo_1_inicio' => $this->input->post('periodo_1_inicio'),
				'periodo_1_termino' => $this->input->post('periodo_1_termino'),
				'periodo_2_inicio' => $this->input->post('periodo_2_inicio'),
				'periodo_2_termino' => $this->input->post('periodo_2_termino'),
				'periodo_3_inicio' => $this->input->post('periodo_3_inicio'),
				'periodo_3_termino' => $this->input->post('periodo_3_termino'),
		);
		$this->vacaciones_model->vacaciones_update(array('badgenumber' => $this->input->post('badgenumber')), $data);
		echo json_encode(array("status" => TRUE));
	}

}
