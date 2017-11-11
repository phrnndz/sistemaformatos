<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * GeneraPDF class.
 * 
 * @extends CI_Controller
 */

class Historico extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('formatos_model');
		
	}

	public function index()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$this->load->view('header');
			$datos['historial'] = $this->formatos_model->get_historial_por_usuario($_SESSION['pk_clave_usuario']);
			$this->load->view('historico/lista_historial',$datos);
			$this->load->view('footer');
		} else {
			redirect('/login');
		}
	}

}
