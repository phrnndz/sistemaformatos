<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * GeneraPDF class.
 * 
 * @extends CI_Controller
 */

class GeneraPDF extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		
		$this->load->helper(array('form'));
		$this->load->helper(array('url'));
		$this->load->model('gerencia_model');
		$this->load->model('roles_model');
		
	}

	public function index()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			echo "Bienvenido a centro de formularios";
		} else {
			redirect('/login');
		}
	}

	public function prueba(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$this->load->view('header');
			$this->load->view('generaPDF/imprime_pdf');
			$this->load->view('footer');
		} else {
			redirect('/login');
		}
	}

	public function imprime(){
		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();

		$html = $this->load->view('welcome_message',[],true);

		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Get the generated PDF file contents
		$pdf = $dompdf->output();

		// Output the generated PDF to Browser
		$dompdf->stream();
	}
}
