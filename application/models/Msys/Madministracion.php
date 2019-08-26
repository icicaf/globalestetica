<?php
/**
*   Clase Madministracion Modelo
*
*   @author     
*   @since      Version 1.0
*/
class Madministracion extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default',TRUE);
    }

    public function get_all_usuarios(){
        $SQL = 'SELECT 
                    *
                FROM 
                    sys_usuarios
                WHERE
                    sys_usuario_estadoUsuario=1;';
        return $this->db->query($SQL)->result_array();
    }
    public function get_usuario_info($id){
        $SQL = 'SELECT 
                    *
                FROM
                    sys_usuarios
                WHERE
                    sys_usuario_ID = '.$id.'
                AND
                    sys_usuario_estadoUsuario=1;';
        return $this->db->query($SQL)->result_array();
    }

    public function insert_usuario($data_usuario){
        $this->db->insert('sys_usuarios', $data_usuario);
        return $this->db->insert_id();
    }
    public function set_usuario($id_usuario,$data){
        $this->db->where('sys_usuario_ID', $id_usuario);
        $this->db->update('sys_usuarios', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return 0;
        }
        else{
            return 1;
        }
        
    }
    public function delete_usuario($id_usuario,$data){
        $this->db->where('sys_usuario_ID', $id_usuario);
        $this->db->update('sys_usuarios', $data);
        return $this->db->insert_id();
    }
    public function get_all_permisos(){
        $SQL = 'SELECT * FROM sys_tipo_permiso;';
        return $this->db->query($SQL)->result_array();
    }
    public function get_permisos_usuario($id){
        $SQL = 'SELECT 
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
                    INNER JOIN sys_permisos AS B
                    INNER JOIN sys_submenus AS C ON C.sys_submenu_ID = B.sys_submenu_sys_submenu_ID
                    INNER JOIN sys_menus AS D ON D.sys_menu_ID = C.sys_menus_sys_menu_ID
                    INNER JOIN sys_modulos AS E ON E.sys_modulo_ID = D.sys_modulos_sys_modulo_ID
                    WHERE
                        A.sys_usuario_estadoUsuario = 1
                        AND BINARY A.sys_usuario_ID = '.$id.'
                    GROUP BY C.sys_submenu_ID
                    ORDER BY E.sys_modulo_orden ASC , D.sys_menu_orden ASC , C.sys_submenu_orden ASC) AS T1';
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    public function set_permisos($usuario,$permiso,$submenu){
        $SQL = 'INSERT INTO sys_permisos (`sys_usuarios_sys_usuario_ID`, `sys_tipo_permiso_sys_tipo_permiso_ID`, `sys_submenu_sys_submenu_ID`) VALUES ('.$usuario.', '.$permiso.', '.$submenu.');';
        $query = $this->db->query($SQL);
        return $this->db->insert_id();
    }
    public function remove_permisos($usuario,$permiso,$submenu){
        $SQL = 'DELETE FROM sys_permisos WHERE (`sys_usuarios_sys_usuario_ID` = '.$usuario.' and `sys_tipo_permiso_sys_tipo_permiso_ID` = '.$permiso.' and`sys_submenu_sys_submenu_ID` = '.$submenu.');';
        $query = $this->db->query($SQL);
        return $this->db->insert_id();
    }

}