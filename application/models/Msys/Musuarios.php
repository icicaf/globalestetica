<?php
/**
*   Clase Musuarios Modelo
*
*   @author     Cristian Aguayo Forteza
*   @since      Version 1.0
*/
class Musuarios extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default',TRUE);
    }

    // public function get_usuarios()
    // {
    //     $SQL = 'SELECT 
    //                 sys_usuario_ID,
    //                 sys_usuario_usuario,
    //                 sys_usuario_clave,
    //                 sys_usuario_nombre,
    //                 sys_usuario_correoElectronico,
    //                 sys_usuario_estadoUsuario
    //             FROM 
    //                 sys_usuarios
    //             WHERE U.usuario_estadoUsuario=1
    //                 ORDER BY U.usuario_id ASC';
        
    //     //DEBUG
    //     //print_r($SQL);
    //     //echo $consulta;
    //     return $this->db->query($SQL)->result_array();
    // }

    public function get_usuario_login($usuario,$clave)
    {
        $consulta = 'SELECT 
                        *
                    FROM
                        (SELECT 
                            A.sys_usuario_ID,
                            A.sys_usuario_usuario,
                            A.sys_usuario_clave,
                            A.sys_usuario_nombre,
                            A.sys_usuario_correoElectronico,
                            A.sys_usuario_estadoUsuario,
                            B.sys_permiso_ID,
                            C.sys_submenu_ID,
                            C.sys_submenu_nombre,
                            C.sys_submenu_orden,
                            C.sys_submenu_urlControlador,
                            D.sys_menu_ID,
                            D.sys_menu_nombre,
                            D.sys_menu_orden,
                            E.sys_modulo_ID,
                            E.sys_modulo_nombre,
                            CASE sys_usuario_ID
                                WHEN
                                    sys_usuario_ID
                                THEN
                                    (SELECT 
                                            GROUP_CONCAT(A.sys_tipo_permiso_sys_tipo_permiso_ID) AS permisos
                                        FROM
                                            sys_permisos AS A
                                        WHERE
                                            sys_usuarios_sys_usuario_ID = A.sys_usuario_ID
                                                AND sys_submenu_sys_submenu_ID = C.sys_submenu_ID
                                        GROUP BY A.sys_submenu_sys_submenu_ID)
                            END permisos
                        FROM
                            sys_usuarios AS A
                                INNER JOIN
                            sys_permisos AS B
                                INNER JOIN
                            sys_submenus AS C ON C.sys_submenu_ID = B.sys_submenu_sys_submenu_ID
                                INNER JOIN
                            sys_menus AS D ON D.sys_menu_ID = C.sys_menus_sys_menu_ID
                                INNER JOIN
                            sys_modulos AS E ON E.sys_modulo_ID = D.sys_modulos_sys_modulo_ID
                        WHERE
                            A.sys_usuario_estadoUsuario = 1
                                AND BINARY A.sys_usuario_usuario = "'.$usuario.'" 
                                AND BINARY sys_usuario_clave = "'.$clave.'" 
                        GROUP BY C.sys_submenu_ID
                        ORDER BY E.sys_modulo_orden ASC , D.sys_menu_orden ASC , C.sys_submenu_orden ASC) AS T1
                            WHERE
                                T1.permisos IS NOT NULL';

        //print_r($consulta);

        return $this->db->query($consulta)->result_array();
    }

    // public function get_tipos_usuarios()
    // {
    //     $consulta = 'SELECT * FROM tipo_usuarios WHERE tipo_usuario_id NOT IN (1,2)';
    //     //DEBUG
    //     //echo $consulta;
    //     return $this->db->query($consulta)->result_array();
    // }

    // //Ingresa usuario
    // public function ingresar_datos_usuario($data_usuario)
    // {
    //     $this->db->trans_begin();   
    //     $this->db->where('usuario_id',$data_usuario['usuario_id']);
    //     $aux = $this->db->get('usuarios');
    //     if($aux->num_rows()>0){
    //         //Actualiza
    //         $this->db->where('usuario_id',$data_usuario['usuario_id']);
    //         $this->db->update('usuarios', $data_usuario);
    //     }else{
    //         //Inserta
    //         $this->db->insert('usuarios', $data_usuario);
    //     }
        
    //     if($this->db->trans_status() === FALSE)
    //     {
    //         $this->db->trans_complete();
    //         return 0;
    //     }
    //     else
    //     {
    //         $this->db->trans_complete();
    //         return 1;
    //     }
    // }

    // public function get_usuarios_registrados()
    // {
    //     $consulta = 'SELECT * FROM usuarios WHERE usuario_habilitado=1';
    //     //DEBUG
    //     //echo $consulta;
    //     return $this->db->query($consulta)->result_array();
    // }

    // public function get_detalle_usuario($id_usuario)
    // {
    //     $consulta = 'SELECT U.usuario_id,
    //                         U.usuario_username,
    //                         U.usuario_password,
    //                         U.usuario_nombre,
    //                         U.usuario_rut,
    //                         U.usuario_correo,
    //                         U.usuario_fecha_creacion,
    //                         U.usuario_fecha_modificacion,
    //                         U.tipo_usuario_id,
    //                         TU.tipo_usuario_nombre
    //                 FROM usuarios AS U
    //                 INNER JOIN tipo_usuarios AS TU ON TU.tipo_usuario_id = U.tipo_usuario_id
    //                 WHERE U.usuario_id ='.$id_usuario;
    //     //DEBUG
    //     //echo $consulta;
    //     return $this->db->query($consulta)->result_array();
    // }

    // public function eliminar_usuario($data_usuario)
    // {
    //     $this->db->trans_begin();   
    //     $this->db->where('usuario_id',$data_usuario['usuario_id']);
    //     $this->db->update('usuarios', $data_usuario);
        
    //     if($this->db->trans_status() === FALSE)
    //     {
    //         $this->db->trans_complete();
    //         return 0;
    //     }
    //     else
    //     {
    //         $this->db->trans_complete();
    //         return 1;
    //     }
    // }
}