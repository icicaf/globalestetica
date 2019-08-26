<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Vista para Login
	 *
	*/
	public function index()
	{
		$this->load->view('login/Vlogin');
	}

	/**
	 *
	 *
	*/
	public function validar_usuario()
	{
		$data["usuario"] = $this->input->post("usuario");
		$data["clave"] = $this->input->post("clave");

		$this->load->model('Musuarios');

		$data['credenciales'] = $this->Musuarios->get_usuario_login($data["usuario"],$data["clave"]);

		$bandera_modulo_id = 0;
		$bandera_menu_id = 0;
		$bandera_submenu_id = 0;

		$a=0;
		$b=0;
		$c=0;

		foreach($data['credenciales'] as $key) 
		{
			if($key["sys_modulo_ID"] !== $bandera_modulo_id)
			{
				$bandera_modulo_id = $key["sys_modulo_ID"];
				$array_modulos[$a]= array("modulo_id"=>$key["sys_modulo_ID"],"modulo_nombre"=>$key["sys_modulo_nombre"]);
				$a++;
			}

			if($key["sys_menu_ID"] !== $bandera_menu_id)
			{
				$bandera_menu_id = $key["sys_menu_ID"];
				$array_menus[$b] = array("menu_modulo_id"=>$key["sys_modulo_ID"],"menu_id"=>$key["sys_menu_ID"],"menu_nombre"=>$key["sys_menu_nombre"]);
				$b++;
			}
			else
			{
				$bandera_menu_id = $key["sys_menu_ID"];
			}

			if($key["sys_submenu_ID"] !== $bandera_submenu_id)
			{
				$bandera_submenu_id = $key["sys_submenu_ID"];
				$array_submenus[$c] = array("submenu_modulo_id"=>$key["sys_modulo_ID"],"submenu_menu_id"=>$key["sys_menu_ID"],"submenu_id"=>$key["sys_submenu_ID"],"submenu_nombre"=>$key["sys_submenu_nombre"],"permisos"=>array($key["permisos"]),"submenu_urlControlador"=>$key["sys_submenu_urlControlador"]);
				$c++;
			}
		}

		$modulos = $this->construirJson($array_modulos,$array_menus,$array_submenus);
		if($data['credenciales'] != NULL)
		{
			$this->session->set_userdata(array('usuario_id' => $data['credenciales'][0]["sys_usuario_ID"],
												'usuario_nombre' => $data['credenciales'][0]['sys_usuario_nombre'],
												'jsonPermisos' => $modulos,
												'logged_in' => TRUE,
												'usuario'=>$data["usuario"],
												'clave'=>$data["clave"]));
			redirect(base_url().'Csys');
		}
		else 
		{
			$this->session->set_flashdata('login', '1');
			redirect(base_url());
		}
	}

	public function construirJson($array_modulos,$array_menus,$array_submenus)
	{
		$arreglo_modulos;

		$i=0;
		foreach($array_modulos as $key) 
		{
			$arreglo_modulos[$i][$key["modulo_nombre"]] = $this->buscarMenu($key["modulo_id"],$array_menus,$array_submenus);
			$i++;
		}

		return $arreglo_modulos;
	}
	public function buscarMenu($id_modulo, $array_menus,$array_submenus)
	{
		$arreglo_menus;
		$k=0;

		foreach($array_menus as $key2)
		{
			if($key2["menu_modulo_id"] == $id_modulo)
			{
				$arreglo_menus[$k][$key2["menu_nombre"]] = $this->buscarSubMenu($key2["menu_id"],$array_submenus);
				$k++;
			}
		}

	 	return $arreglo_menus;
	}

	public function buscarSubMenu($id_menu, $array_submenus)
	{
		$arreglo_submenus;
		$j=0;

		foreach($array_submenus as $key3)
		{
			if($key3["submenu_menu_id"] == $id_menu)
			{
				$arreglo_submenus[$j][$key3["submenu_nombre"]] = $key3;
				$j++;
			}
		}

		return $arreglo_submenus;
	}
}