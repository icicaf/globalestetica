<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CgestorCuentas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madministracion');
	}

	/**
	 * DEBUG
	 *
	 */

	public function debug(){
		ECHO 'CONTROLADOR OK';
	}

	public function get_head(){
		return $this->load->view('sys/Vhead',NULL,TRUE);
   	}

   	public function get_scripts(){
   		return $this->load->view('sys/VScripts',NULL,TRUE);
   	}

	public function index(){
		ECHO 'CONTROLADOR OK';
	}

	public function get_gestion_usuario($menu_id){
		switch ($menu_id) {		
			case '1':
				$data["usuarios"]=$this->Madministracion->get_all_usuarios();
				$data["usuarios"]=json_encode($data["usuarios"]);
				return $this->load->view('modulo_administracion/gestor_cuentas/VadministracionCrearUsuario',$data,false);
			break;
		}		
	}

	public function registrar_usuario(){
		$sys_usuario_ID = NULL;
		$sys_usuario_usuario = $this->input->post('form_usuario');
		//$sys_usuario_clave = $this->generar_password(6);
		$sys_usuario_clave = $sys_usuario_usuario[0].$sys_usuario_usuario[1].$sys_usuario_usuario[2].$sys_usuario_usuario[3];
		$sys_usuario_nombre = $this->input->post('form_nombre');
		$sys_usuario_correoElectronico = $this->input->post('form_correo_id');
		$sys_usuario_correoElectronico = $sys_usuario_correoElectronico.'@'.$this->input->post('form_correo_host');
		$sys_usuario_estadoUsuario = 1;
		$created=date('Y-m-d H:i:s');

		$data = array(	'sys_usuario_ID'=>$sys_usuario_ID,
						'sys_usuario_usuario'=>$sys_usuario_usuario,
						'sys_usuario_clave'=>$sys_usuario_clave,
						'sys_usuario_nombre'=>$sys_usuario_nombre,
						'sys_usuario_correoElectronico'=>$sys_usuario_correoElectronico,
						'sys_usuario_estadoUsuario'=>$sys_usuario_estadoUsuario,
						'created'=>$created);

		$result = $this->Madministracion->insert_usuario($data);
		
		if($result>0){
			$this->enviar_correo($sys_usuario_usuario,$sys_usuario_clave,$sys_usuario_correoElectronico);
			echo "Usuario creado Correctamente";
		}
	}

	function generar_password($largo){
		$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$cadena_base .= '0123456789' ;
		$cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
	   
		$password = '';
		$limite = strlen($cadena_base) - 1;
	   
		for ($i=0; $i < $largo; $i++){
			$password .= $cadena_base[rand(0, $limite)];
		}
	   
		return $password;
	}

	public function get_registros_usuarios(){
		$data = $this->Madministracion->get_all_usuarios();
		echo '{"data":'.json_encode($data).'}';
	}

	public function get_permisos(){
		$data = $this->Madministracion->get_all_permisos();
		echo '{"datos":'.json_encode($data).'}';
	}

	public function get_info_usuario(){
		$id = $this->input->post("id_usuario"); 
		$data = $this->Madministracion->get_usuario_info($id);
		echo '{"datos":'.json_encode($data).'}';
	}

	public function get_permisos_usuario(){
		$id = $this->input->post("id_usuario"); 
		$data = $this->Madministracion->get_permisos_usuario($id);
		echo '{"datos":'.json_encode($data).'}';
	}
	public function modificar_usuario(){
		$sys_usuario_ID = $this->input->post('id_usuario');
		$sys_usuario_usuario = $this->input->post('form_usuario');
		$sys_usuario_nombre = $this->input->post('form_nombre');
		$sys_usuario_correoElectronico = $this->input->post('form_correo_id');
		$sys_usuario_correoElectronico = $sys_usuario_correoElectronico.'@'.$this->input->post('form_correo_host');

		$data = array(	'sys_usuario_usuario'=>$sys_usuario_usuario,
						'sys_usuario_nombre'=>$sys_usuario_nombre,
						'sys_usuario_correoElectronico'=>$sys_usuario_correoElectronico);

		$result = $this->Madministracion->set_usuario($sys_usuario_ID,$data);
		
		echo $result;
		//echo $contenido;
	}
	public function disable_usuario(){
		$sys_usuario_ID = $this->input->post('id_usuario');	
		$data = array('sys_usuario_estadoUsuario'=>0);
		$result = $this->Madministracion->set_usuario($sys_usuario_ID,$data);
	}
	public function modificar_permisos(){
		$contenido = $this->input->post('data');
		$usuario = $this->input->post('user');
		//$contenido = stripslashes($contenido);
		$contenido =json_decode($contenido);
		//$data = $this->Madministracion->get_permisos_usuario($id );
		//echo '{"datos":'.json_encode($data).'}';
		$np = $this->Madministracion->get_all_permisos();
		$compara = $this->Madministracion->get_permisos_usuario($usuario);
		//print_r( json_decode($contenido));
		//$fruits_ar = explode(',', $compara[5]["permisos"]);
		//si tiene permiso
		// if($fruits_ar[0]==null){
		// 	print_r ($fruits_ar);
		// }
		$cambios=0;
		//print_r($contenido[0]);
		for($i=0;$i<sizeof($contenido);$i++){
			$permisos = explode(',', $compara[$i]["permisos"]);
			//print_r($permisos);
			for($j=0;$j<sizeof($contenido[0]);$j++){
				//$cambios=$j;
				if($contenido[$i][$j]!=0){
					if(empty($permisos[0])){
						//agrega permiso desde 0
						$this->Madministracion->set_permisos($usuario,$contenido[$i][$j],$compara[$i]["sys_submenu_ID"]);
						$cambios=$cambios+1;
					}
					else{
						$cmp=array(0 =>$contenido[$i][$j] );
						$resultado = array_diff($cmp, $permisos);
						if(sizeof($resultado)!=0){
							$this->Madministracion->set_permisos($usuario,$contenido[$i][$j],$compara[$i]["sys_submenu_ID"]);
							$cambios=$cambios+1;
						}
					}
					// if(!empty($permisos[0])){
					// 	$cambios = "no paso nada";
					// }					
				}
				if($contenido[$i][$j]==0){
					//if(empty($permisos[0])){
					//	$cambios = "no paso nada";
					//}
					if(!empty($permisos[0])){
						//quitar permiso
						$encontrar=sizeof($permisos);
						$busca=0;
						
						$remover=array_diff($permisos,$contenido[$i]);
						$remover = array_diff($remover, array(0,"0"));
						for($k=0;$k<sizeof($permisos);$k++){
							if($permisos[$k]==$contenido[$i][$k]){
								$busca=$busca+1;						
							}
						}
						if($busca<$encontrar){
							foreach($remover as $posicion=>$rem){
								$this->Madministracion->remove_permisos($usuario,$rem,$compara[$i]["sys_submenu_ID"]);
								$cambios=$cambios+1;
								//$cambios = "se quito";
							}
						}
						//$this->Madministracion->remove_permisos($usuario,$contenido[$i][$j],$compara[$i]["sys_submenu_ID"]);
						//$cambios=$cambios+1;
						//$cambios = "se quito";
					}				
				}
				//$cambios=($permisos);
			}			
		}
		
		echo $cambios;
	}
	
	function enviar_correo($usuario,$contr,$correo){
		echo 'ok';
		$this->load->library('Mphpmailer');
        $mail = new PHPMailer();
        $mail->IsSMTP();  
        $mail->CharSet='UTF-8';
        $mail->SMTPDebug = false;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";  
        $mail->SMTPDebug  = false;
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->Username   = "notificaciones@sanisidrosa.cl";
        $mail->Password   = "capsi123";
        $mail->SetFrom('notificaciones@sanisidrosa.cl', 'Notificaciones San Isidro');
        $mail->AddReplyTo("notificaciones@sanisidrosa.cl","No responder");
        $mail->Subject    ="IOTSYS";
		$mail->IsHTML(true);  
		
		$logo="http://opsi.ddns.net/sysopsi/assets/images/logo_empresa.png";
		$app="http://opsi.ddns.net/sysopsi/assets/images/apps.gif";
		$pass="http://opsi.ddns.net/sysopsi/assets/images/right.gif";
		$mail->Body      = 
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Notificaciones San Iisdro</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			</head>
			<body style="margin: 0; padding: 0;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%">	
					<tr>
						<td style="padding: 10px 0 30px 0;">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
								<tr>
									<td align="center" bgcolor="#FFFFFF" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
										<img src="'.$logo.'" alt="Aguas San Isidro" style="display: block;" />
									</td>
								</tr>
								<tr>
									<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
													<b>Aguas San Isidro te da la bienvenida!</b>
												</td>
											</tr>
											<tr>
												<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
													Su cuenta para trabajar con nuestros sistemas ha sido creada y esta lista para ser usada.
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td width="260" valign="top">
																<table border="0" cellpadding="0" cellspacing="0" width="100%">
																	<tr>
																		<td>
																			<img src="'.$app.'" alt="" width="100%" height="140" style="display: block;" />
																		</td>
																	</tr>																	
																</table>
															</td>
															<td style="font-size: 0; line-height: 0;" width="20">
																&nbsp;
															</td>
															<td width="260" valign="top">
																<table border="0" cellpadding="0" cellspacing="0" width="100%">
																	<tr>
																		<td>
																			<img src="'.$pass.'" alt="" width="100%" height="140" style="display: block;" />
																		</td>
																	</tr>																	
																</table>
															</td>
														</tr>														
													</table>
												</td>
											</tr>
											<tr cellpadding="2">
												<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
													Para acceder a nuestros sistemas accede al siguiente enlace:<br><br> http://sanisidrosa.cl/iotsys/ <br><br>
													Su cuenta es <b>'.$usuario.'</b> y su contraseña autogenerada <b>'.$contr.'</b> <br> Recomendamos cambiar esta ultima en el gestor de usuarios.
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
													&reg; Aguas San Isidro S.A. 2019<br/>
													<a style="color: #ffffff;">Equipo de desarrollo e Informática
												</td>												
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</body>
		</html>';
        $mail->AltBody = "SYSOPSI";

    	//for($i=0;$i<$largo;$i++){
        	//$mail->addAttachment("nmiranda@sanisidrosa.cl");
        //}
        //correos destino
        //$mail->AddBCC("cristian.aguayo@sanisidrosa.cl","Cristian Aguayo");
        $mail->AddAddress($correo,"Nuevo usuario");
        //$mail->AddAddress("analista.informatica@sanisidrosa.cl","Nicolás Miranda");
        //$mail->AddAddress("analista.informatica@sanisidrosa.cl","Nicolás Miranda");

        if(!$mail->Send())
        {
           $data["message"] = "Error: " . $mail->ErrorInfo;
        }
        else
        {
            $data["message"] = 1;
        }
    }
}