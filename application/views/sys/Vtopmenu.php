<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu" active>
                    <a class="idSubmenu" href="javascript:void(0);" id="0" data-value="0" moduloNombre="Inicio" menuNombre="" submenuNombre="Inicio" urlControlador="moduloInicio/Cinicio" onclick="return false;"><i class="ti-home"></i>Inicio</a>
                </li>
                <?php
                  $html='';
                  $arr_id_submenu;
                  $modulo_nombre;
                  $nombre_menu;

                  for ($i=0; $i < count($jsonPermisos); $i++) 
                  {
                    $modulo_nombre = key($jsonPermisos[$i]);
                    $modulo = $jsonPermisos[$i];

                    $html.='<li class="has-submenu">
                              <a href="#"><i class="ti-view-grid"></i>'.$modulo_nombre.'</a>';
                      $html.='<ul class="submenu">';

                    for ($k=0; $k < count($jsonPermisos[$i]) ; $k++) 
                    {
                      foreach ($jsonPermisos[$i] as $key) 
                      {
                        foreach ($key as $key2) 
                        {
                          $nombre_menu = key($key2);
                          $html.='<li class="has-submenu">
                                    <a href="#">'.$nombre_menu.'</a>
                                    <ul class="submenu">';

                          for ($j=0; $j < count($key2[$nombre_menu]); $j++) 
                          {
                            $nombre_submenu = key($key2[$nombre_menu][$j]);
                            //DEBUG
                            //print_r($key2);
                            $id_submenu = $key2[$nombre_menu][$j][$nombre_submenu]["submenu_id"];
                            $submenu_urlController = $key2[$nombre_menu][$j][$nombre_submenu]["submenu_urlControlador"];
                            $html.='<li><a class="idSubmenu" id="'.$id_submenu.'" href="#" data-value="'.$id_submenu.'" moduloNombre="'.$modulo_nombre.'" menuNombre="'.$nombre_menu.'" submenuNombre="'.$nombre_submenu.'" urlControlador="'.$submenu_urlController.'" onclick="return false;">'.$nombre_submenu.'</a></li>';
                          }
                            $html.='</ul>';
                          $html.='</li>';
                        }
                      }
                        $html.='</ul>';
                      $html.='</li>';
                    }
                  }
                  echo $html;
                ?>
            </ul>
            <!-- End navigation menu -->
        </div> <!-- End #navigation -->
    </div> <!-- End container -->

    <script type="text/javascript">

    $('.idSubmenu').on('click', function (e) {
      var url_breadcrumb = '<?php echo base_url(); ?>Csys/set_htmlBreadcrumb';
      var moduloNombre = $(this).attr('moduloNombre');
      var menuNombre = $(this).attr('menuNombre');
      var submenuNombre = $(this).attr('submenuNombre');
      var urlControlador = $(this).attr('urlControlador');

      $.post(url_breadcrumb, {modulo:moduloNombre, menu:menuNombre, submenu:submenuNombre}, function(respuesta) {
        $('#bread').html(respuesta);
      });

      $(document).ajaxStop($.unblockUI);
      $.blockUI({message: null,overlayCSS: { backgroundColor: '#007bff'} });

      var url = '<?php echo base_url(); ?>'+urlControlador;
      $('#bodycentral').load(url, function(responseTxt, statusTxt, xhr) {
        if(statusTxt == "success")
        {
          $('#bodycentral').html(responseTxt);
        }
        if(statusTxt == "error")
        {
          $.Notification.autoHideNotify('error', 'top center', "Error: " + xhr.status, xhr.statusText);
          $('#bodycentral').html('');
        }
      });
    });
</script>
</div> <!-- End navbar-custom -->