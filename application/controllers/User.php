<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pamela Hernández
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');	
	}
	
	
	public function index() {

	}

	public function login() {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			//redirigir a admin si ya estas logueado
			redirect('admin');
		} else {
			// create the data object
			$data = new stdClass();
			
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_message('password', 'Error Message');
			
			if ($this->form_validation->run() == false) {
				
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('user/login/login');
				$this->load->view('footer');
				
			} else {
				
				// seteo de variables de form
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->user_model->resolve_user_login($username, $password)) {
					
					//$user_id = $this->user_model->get_user_id_from_username($username);
					$user   = $this->user_model->get_user($username);
					
					// seteo de sesión
					$_SESSION['badgenumber']      			= (int)$user[0]['badgenumber'];
					$_SESSION['pk_clave_usuario']     		= (int)$user[0]['badgenumber'];
					$_SESSION['clave_usuario']     			= (string)$user[0]['clave_usuario'];
					$_SESSION['nombre_usuario']    			= (string)$user[0]['nombre_usuario'];
					$_SESSION['titulo_interno_usuario']    	= (string)$user[0]['titulo_interno_usuario'];
					$_SESSION['puesto_nombre']     			= (string)$user[0]['clave_puesto'];
					$_SESSION['fecha_contratacion']			= (string)$user[0]['ingreso_usuario'];
					$_SESSION['logged_in']    				= (bool)true;
					
					
					redirect('/admin');
					// user login ok
					
				} else {
					
					// login fallo
					$data->error = 'Usuario o contraseña incorrectos.';
					
					// Envia error
					$this->load->view('header');
					$this->load->view('user/login/login', $data);
					$this->load->view('footer');
					
				}
				
			}
		}
		
	}
	
	public function logout() {
		
		// data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// limpia sesion
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// comprueba logout correcto
			$this->load->view('header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('footer');
			
		} else {
			
			// 
			// redirect al root
			redirect('/');
			
		}
		
	}

	public function busquedanombre($nombre){
        $data= $this->user_model->get_badgenumber_by_search($nombre);
        echo json_encode($data);
        
	}

	
}
