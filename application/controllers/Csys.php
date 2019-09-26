<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csys extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		if ($this->tank_auth->is_logged_in()) 
		{									// logged in
			
		}
		else
		{
			redirect(base_url());
		}
		// if($this->session->userdata('logged_in') != TRUE)
		// {
		// 	redirect(base_url());
		// }
    }

	/**
	 * Modulos principales sistemas y carga de componentes
	 *
	*/
	public function index()
	{
		//Se carga html_head solo el head del sistema y todos los css y los script
		//$data["html_head"] = $this->get_htmlHead(); 

		//Se carga el html_topbar menu (Salir del sistema, barrara de usuario, etc.)
		//$data["html_topbar"] = $this->get_htmlTopbar();

		//Se carga el html_topmenu el cual es la barra de menu que maneja el acceso a los modulos y menus y submenus
		//$data["html_topmenu"] = $this->get_htmlTopmenu();

		//Se carga el titulo de la pagina (donde estoy oarado...)
		//$data["html_breadcrumb"] = $this->get_htmlBreadcrumb();

		//Se carga el contenido de las paginas
		//$data["html_bodycentral"] = $this->get_htmlBodycentral();

		//Se carga el pie de pagina
		//$data["html_footer"] = $this->get_htmlFooter();

		//Scipt SISTEMA, se cargan al final
		//$data["html_scripts"] = $this->get_htmlScipts();

		//Par cada Modulo se carga su Script
		//$data["script_inicio"] = $this->modulo_inicio();

		//Modulo inicio, se carga el inicio como primera vista
		//Modulo Carga Vistas
		$this->load->view('sys/Vsys');
	}

	// Moudulo de inicio
	public function modulo_inicio()
	{
		return $this->load->view('inicio/Vscript_inicio_menu',NULL,TRUE);	
	}

	//----------------------------------------------------------------------------------------

	/**
	 * Componentes HEAD html
	 *
	*/
	public function get_htmlHead()
	{
		return $this->load->view('sys/Vhead',NULL,TRUE);
	}

	/**
	 * Componentes TOPBAR html
	 *
	*/
	public function get_htmlTopbar()
	{
		return $this->load->view('sys/Vtopbar',NULL,TRUE);
	}

	/**
	 * Componentes principal TOPBAR html
	 *
	*/
	public function get_htmlTopmenu()
	{
		$data["jsonPermisos"] = $this->session->userdata('jsonPermisos');

		return $this->load->view('sys/Vtopmenu',$data,TRUE);
	}

	/**
	 * Componentes principal BREADCRUMB html - Array{'titulo_menu','titulo_opcion'}
	 *
	*/
	public function get_htmlBreadcrumb()
	{
		$data['breadcrumb_titulo'] = 'Global Estetica';
		$data['breadcrumb_modulo'] = 'Inicio';
		$data['breadcrumb_menu'] = '';
		$data['breadcrumb_submenu'] = 'Inicio';
		return $this->load->view('sys/Vbreadcrumb',$data,TRUE);
	}

	/**
	 * Componentes principal BREADCRUMB html - Array{'titulo_menu','titulo_opcion'}
	 *
	*/
	public function set_htmlBreadcrumb()
	{
		$data['breadcrumb_titulo'] = 'Global Estetica';
		$data['breadcrumb_modulo'] = $this->input->post('modulo');
		$data['breadcrumb_menu'] = $this->input->post('menu');
		$data['breadcrumb_submenu'] = $this->input->post('submenu');
		return $this->load->view('sys/Vbreadcrumb',$data,FALSE);
	}

	/**
	 * Componentes principal BODYCENTRAL html
	 *
	*/
	public function get_htmlBodycentral()
	{
		return $this->load->view('sys/Vbodycentral',NULL,TRUE);
	}
	
	/**
	 * Componentes principal FOOTER html
	 *
	*/
	public function get_htmlFooter()
	{
		return $this->load->view('sys/Vfooter',NULL,TRUE);
	}

	/**
	 * Componentes principal FOOTER html
	 *
	*/
	public function get_htmlScipts()
	{
		return $this->load->view('sys/Vscripts',NULL,TRUE);
	}

	public function salir()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}