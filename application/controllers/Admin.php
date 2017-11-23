<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Admin extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Mexico_City');
		//carga de modelos
		$this->load->library(array('session'));
		$this->load->library('form_validation');
		$this->load->helper(array('form'));
		$this->load->helper(array('url'));
		$this->load->model('gerencia_model');
		$this->load->model('puestos_model');
		$this->load->model('formatos_model');
		$this->load->model('vacaciones_model');

		$this->load->helper('numeros');
		$this->load->helper('formatos');
	}
	
	//Vista principal
	public function index() {
		//si estas logueado
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$this->load->view('header');
			// Lista las solicitudes pendientes para el usuario logueado
			$datos['solicitudes'] = $this->formatos_model->get_solicitudes($_SESSION['pk_clave_usuario']);
			// Lista de solicitudes enviadas , aceptadas y rechazadas
			$datos['solicitudesAcep'] = $this->formatos_model->get_solicitudes_usuario_aceptadas($_SESSION['badgenumber']);
			$datos['solicitudesPend'] = $this->formatos_model->get_solicitudes_usuario_pendientes($_SESSION['badgenumber']);
			$datos['solicitudesRech'] = $this->formatos_model->get_solicitudes_usuario_rechazadas($_SESSION['badgenumber']);
			// Lista todas las gerencias
			$datos['gerencias'] = $this->gerencia_model->get_gerencias();
			$this->load->view('admin/admin_lista_gerencias', $datos);
			$this->load->view('footer');
		} else {
			redirect('/login');
		}
	}

	//lista de formatos por gerencia
	public function Gerencia($slug_gerencia){
		//si estas logueado
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$this->load->view('header');
			$datos['formatos'] = $this->gerencia_model->get_gerencia_formatos($slug_gerencia);
			$this->load->view('admin/admin_lista_formatos', $datos);
			$this->load->view('footer');
		} else {
			redirect('/login');
		}
	}

	public function GerenciaDHO($slug_formato){
		//si logueado
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$this->load->view('header');

			$datos['infoFormato'] 		= $slug_formato;
			//consulta a models para nutrir vistas
			$datos['directivos'] 		= $this->puestos_model->get_nombre_de_directivos();
			$datos['puestos'] 			= $this->puestos_model->get_puestos();
			$datos['infoVacaciones']	= $this->vacaciones_model->get_info_by_id($_SESSION['badgenumber']);

			//obtiene validaciones de forms de acuerdo al formato requisitado
			switch ($slug_formato) {
				case 'llamada_de_atencion_2017':
					$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span><br>');
					$this->form_validation->set_rules('nombreEmpleado', 'nombreEmpleado', 'required');
					$this->form_validation->set_rules('puestoTrabajo', 'puestoTrabajo', 'required');
					$this->form_validation->set_rules('irregularidadTexto', 'irregularidadTexto', 'required');
					$this->form_validation->set_rules('claveRecibe', 'claveRecibe', 'required');
					$this->form_validation->set_rules('puestoRecibe', 'puestoRecibe', 'required');
					break;
				case 'solicitud_de_vacaciones_2017':
					$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span><br>');
					$this->form_validation->set_rules('nombreEmpleado', 'nombreEmpleado', 'required');
					$this->form_validation->set_rules('fechaInicioLaboral', 'fechaInicioLaboral', 'required');
					$this->form_validation->set_rules('fechaSolicitudInicio', 'fechaSolicitudInicio', 'required');
					$this->form_validation->set_rules('fechaSolicitudTermino', 'fechaSolicitudTermino', 'required');
					break;
				case 'solicitud_prestamo_laboral_2017':
					$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span><br>');
					$this->form_validation->set_rules('nombreEmpleado', 'nombreEmpleado', 'required');
					$this->form_validation->set_rules('fechaInicioLaboral', 'fechaInicioLaboral', 'required');
					$this->form_validation->set_rules('puestoTrabajo', 'puestoTrabajo', 'required');
					$this->form_validation->set_rules('montoSolicitado', 'montoSolicitado', 'required');
					$this->form_validation->set_rules('numeroCatorcenas', 'numeroCatorcenas', 'required');
					$this->form_validation->set_rules('tipoImprevisto', 'tipoImprevisto', 'required');
					$this->form_validation->set_rules('fechaPrestamo', 'fechaPrestamo', 'required');
					$this->form_validation->set_rules('claveRecibe', 'claveRecibe', 'required');
					$this->form_validation->set_rules('puestoRecibe', 'puestoRecibe', 'required');
					break;

				case 'solicitud_de_fondo_ahorro_2017':
					$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span><br>');
					$this->form_validation->set_rules('nombreEmpleado', 'nombreEmpleado', 'required');
					$this->form_validation->set_rules('fechaInicioLaboral', 'fechaInicioLaboral', 'required');
					$this->form_validation->set_rules('puestoTrabajo', 'puestoTrabajo', 'required');
					$this->form_validation->set_rules('fechaSolicitudInicio', 'fechaSolicitudInicio', 'required');
					$this->form_validation->set_rules('claveRecibe', 'claveRecibe', 'required');
					$this->form_validation->set_rules('puestoRecibe', 'puestoRecibe', 'required');
					break;

				case 'formulario_de_salida_sacimex_2017':
					$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span><br>');
					$this->form_validation->set_rules('claveRecibe', 'claveRecibe', 'required');
					$this->form_validation->set_rules('motivos[]', 'motivos[]', 'required');
					$this->form_validation->set_rules('tiempo', 'tiempo', 'required');
					$this->form_validation->set_rules('ambiente', 'ambiente', 'required');
					$this->form_validation->set_rules('reglamentos', 'reglamentos', 'required');
					$this->form_validation->set_rules('beneficios', 'beneficios', 'required');
					$this->form_validation->set_rules('carga', 'carga', 'required');
					$this->form_validation->set_rules('carrera', 'carrera', 'required');
					$this->form_validation->set_rules('expectativas', 'expectativas', 'required');
					$this->form_validation->set_rules('objetivos', 'objetivos', 'required');
					$this->form_validation->set_rules('reconocimiento', 'reconocimiento', 'required');
					$this->form_validation->set_rules('salario', 'salario', 'required');
					$this->form_validation->set_rules('valores', 'valores', 'required');

					break;
				case 'permiso_a_cuenta_de_vacaciones_2017':
					$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span><br>');
					$this->form_validation->set_rules('nombreEmpleado', 'nombreEmpleado', 'required');
					$this->form_validation->set_rules('fechaInicioLaboral', 'fechaInicioLaboral', 'required');
					$this->form_validation->set_rules('puestoTrabajo', 'puestoTrabajo', 'required');
					$this->form_validation->set_rules('claveRecibe', 'claveRecibe', 'required');
					$this->form_validation->set_rules('puestoRecibe', 'puestoRecibe', 'required');
					$this->form_validation->set_rules('permisoPeriodo1','permisoPeriodo1','required');
					
					//Validacion de días para permiso  a cuenta de vacaciones
					$diasLey		= 	$datos['infoVacaciones']->diasLey;
					$diasUsados 	= 	$datos['infoVacaciones']->diasPermisoUsados1
										+$datos['infoVacaciones']->diasPermisoUsados2
										+$datos['infoVacaciones']->diasUsados1
										+$datos['infoVacaciones']->diasUsados2
										+$datos['infoVacaciones']->diasUsados3;
					$diasDomingos 	=	$datos['infoVacaciones']->domingos1
										+$datos['infoVacaciones']->domingos2
										+$datos['infoVacaciones']->domingos3;
					//Los dias domingos no se cuentan, es por eso que se restan los domingos a la cantidad total de días
					$datos['diasUsadosTotal'] = $diasUsados-$diasDomingos;
					//A los dias por ley se le restan los usados
					$datos['diasLibresTotal'] = $diasLey-($diasUsados-$diasDomingos);
					//Bandera que me dice si mostrar o no el formulario en funcion a los permisos que tiene disponibles
					if ($datos['infoVacaciones']->diasPermisoUsados1 != 0 && $datos['infoVacaciones']->diasPermisoUsados2 != 0) {
						$datos['validaMostrarForm'] = FALSE;
					}else{
						$datos['validaMostrarForm']	= TRUE;
					}

				
				default:
				
					break;
			}
			//si form no cumple validaciones
			if ($this->form_validation->run() == FALSE){
                $this->load->view('formato/GDHO/form_'.$slug_formato, $datos);
            }
            else{
            	//si form pasa validacion revisar datos
            	$data['datos'] = $this->input->post();


            	//INICIO Formateo de Array exclusivo para formulario_de_salida_sacimex_2017
            	if ($data['datos']['formatoRequisitado'] =='formulario_de_salida_sacimex_2017') {
            		foreach ($data['datos']['motivos'] as $key => $valor) {
            			$field = 'motivos'.$key;     
            			$data['datos'][$field] = $valor;       		
            		}
            		//contador
            		$data['datos']['motivoskey']= count($data['datos']['motivos']);
            		//elimina el array del array
            		unset($data['datos']['motivos']);
            	}
            	//FIN Formateo de Array exclusivo para formulario_de_salida_sacimex_2017



            	// Obtener destinatarios
            	$data['destinatario'] = $this->puestos_model->get_nombre_directivo_por_clave($data['datos']['claveRecibe']);
            	$data['puesto'] = $this->puestos_model->get_nombre_puesto_por_clave($data['datos']['puestoRecibe']);
				$this->load->view('generaPDF/revisa_solicitud', $data);
            }
			
			$this->load->view('footer');
		} else {
			redirect('/login');
		}
		
	}


	//funcion que guarda datos de los form
	public function guardaDatos(){
		//si estas logueado
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
				$now = date('Y-m-d H:i:s');
				//capta datos de form
            	$data['datos'] = $this->input->get();
            	
            	//capta variable GET
				$queryString = $_SERVER['QUERY_STRING'];

				//que formato se requisito
				$formatoRequisitado = 	$data['datos']['formatoRequisitado'];
				$query = array(
				   'id_historial_formatos' => NULL ,
				   'slug_formato' 	=> 	$formatoRequisitado,
				   'nombre_usuario'	=> 	$data['datos']['nombreEmpleado'],
				   'clave_usuario' 	=> 	$data['datos']['claveUsuario'],
				   'clave_remitente'=>	$data['datos']['claveUsuario'],
				   'clave_destino' 	=>	$data['datos']['claveRecibe'],
				   'puesto_destino' =>	$data['datos']['puestoRecibe'],
				   'get' 			=> 	$queryString,
				   'status'			=>	'P',
				   'fecha'			=> 	$now
				);


				$this->formatos_model->guarda_historial($query);
				//helper formatos
				valida_insertar_permisos($formatoRequisitado,$data);
				$this->load->view('header');
				$this->load->view('generaPDF/autorizacion_pendiente', $data);
				$this->load->view('footer');
		} else {
			redirect('/login');
		}
	}


	//Muestra la solicitud y manda a la vista el id_historial_formatos para cambiar status
	public function revisaSolicitud($id_historial_formatos){
		//si estas logueado
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$datos['idSolicitud'] = $id_historial_formatos;
			$this->load->view('header');
			$this->load->view('generaPDF/revisa_datos',$datos);
			$this->load->view('footer');
		} else {
			redirect('/login');
		}
	}

	// Muestra un formato por GET
	// $data es el nombre del formato
	public function showIframe($data){
		$this->load->view('formato/GDHO/'.$data);
	}

	// Renderiza formato por GET-
	// $data es el nombre del formato
	public function showPDF($data){
		$templateFile = $this->load->view('formato/GDHO/'.$data);
		$html = $this->output->get_output();
		ob_start();
		$contents = ob_get_clean(); 
		if ($contents !== false)
		{
			$options = new Dompdf\Options();
			$options->set('isRemoteEnabled', TRUE);
			$options->set('isJavascriptEnabled', TRUE);
			$dompdf = new Dompdf\Dompdf($options);
			$dompdf->load_html($html);
			$dompdf->render();
			$dompdf->stream($_SESSION['nombre_usuario'] .".pdf");
		}
	}	

	// Actualizar el estado de una solicitud por POST
	public function actualizaStatus(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$data['datos'] = $this->input->post();
			$this->load->view('header');
			$this->formatos_model->actualizaSolicitud($data);
			$this->load->view('generaPDF/formato_confirmacion',$data);
			$this->load->view('footer');
		} else {
			redirect('/login');
		}

	}

	//populate selects
	public function populatePuesto($badgenumber){
        $data['query']= $this->puestos_model->get_puesto_by_badgenumber($badgenumber);
        echo json_encode($data);
        
	}
}
