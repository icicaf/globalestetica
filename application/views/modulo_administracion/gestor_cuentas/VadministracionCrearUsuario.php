<div class="row">
    <div class="col-sm-12">
        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light mb-4" onclick="open_modal_usuario()">
            <i class="mdi mdi-plus-circle"></i> Crear Usuario
        </button>
        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light mb-4" onclick="mostrar_usuarios()">
            <i class="mdi mdi-plus-circle"></i> Mostrar Usuarios
        </button>
    </div>
    <table id="tabla_usuarios" class="table table-striped table-hover" style="width: 100%;">
        <thead>
            <tr class="info"  style="background-color:#AAE9B0; text-align: center;">
                <th>#</th>
                <th>Usuario</th>
                <th>Contraseña</th>   
                <th>Nombre</th>
                <th>Correo</th>
                <th>Estado</th> 
                <th>Creado</th> 
                <th>Modificado</th>       
                <th>Permisos</th>
                <th>Modificar</th>    
                <th>Eliminar</th>   
            </tr>
        </thead>
    </table>
    <form name="formulario_registro_usuario" id="form_reg" class="" onsubmit="return false;">
        <div name="modal_registro_usuario" id="modal_registro_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="tab-pane fade show active" id="formulario_registro">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-box" style="background-color: #f7f7f7;">
                                        <h4 class="header-title m-t-0">Crear Usuario</h4>
                                        <p class="text-muted font-12 m-b-20"></p>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Usuario</label>
                                            <div class="col-10">
                                                <input name="form_usuario" type="number" max="99999999" class="form-control" placeholder="Ingrese rut del usuario" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Nombre</label>
                                            <div class="col-10">
                                                <input name="form_nombre" type="text" class="form-control" placeholder="Ingrese nombre y apellido del usuario" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Correo Electrónico</label>
                                            <div class="col-10">
                                                <div class="input-group">
                                                    <input name="form_correo_id" type="text" class="form-control" placeholder="Ingrese correo electrónico del usuario" required>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input name="form_correo_host" type="text" class="form-control" value="sanisidrosa.cl" placeholder="Ingrese casilla correo" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form name="formulario_permiso_usuario" class="" onsubmit="return false;">
        <div name="modal_permiso_usuario" id="modal_permiso_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="tab-pane fade show active" id="formulario_permiso">
                            
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="submit_permisos" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form name="formulario_editar_usuario" class="" onsubmit="return false;">
        <div name="modal_editor_usuario" id="modal_editor_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="tab-pane fade show active" id="formulario_editar">
                            
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="submit_editar" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="result"></div>
<script>
    function format ( d ) {
        html="";
    }
</script>
<script type="text/javascript">
    $('form').parsley();
    $("#tabla_usuarios").hide();
    $.validar_formulario = function(){
        var errores = 0;
        $("#formulario_registro").find("select").each(function(){
            var nombre_elemento = $(this).attr("name");
            if($(this).prop('required')) {
                if($(this).val().length < 1) {
                    errores++;
                }
                else{

                }
            }
        });

        $("#formulario_registro").find("input").each(function (){
            var nombre_elemento = $(this).attr("name");
            var arreglo_usuarios= '<?php echo( $usuarios) ?>';
            arreglo_usuarios=JSON.parse(arreglo_usuarios);
            if($(this).prop('required')) {
                if($(this).val().length < 1) {
                    errores++;
                }
                else{                    
                    if(nombre_elemento=="form_usuario"){
                        for(var i=0;i<arreglo_usuarios.length;i++){
                            if(arreglo_usuarios[i].sys_usuario_usuario==$(this).val()){
                                $('input[name=form_usuario]').val('');
                                $.Notification.autoHideNotify('warning', 'top right', 'Advertencia!!!','Este RUT de usuario ya se encuentra registrado, intente con otro')
                            }
                            else{
                              console.log("no duplicado pasa");
                            }
                        }
                    }
                }
            }            
        });
        return errores;
    }
    $.validar_formulario_editar = function(){
        var errores = 0;
        $("#formulario_editar").find("select").each(function(){
            var nombre_elemento = $(this).attr("name");
            if($(this).prop('required')) {
                if($(this).val().length < 1) {
                    errores++;
                }
                else{

                }
            }
        });

        $("#formulario_editar").find("input").each(function (){
            var nombre_elemento = $(this).attr("name");
            var arreglo_usuarios= '<?php echo( $usuarios) ?>';
            arreglo_usuarios=JSON.parse(arreglo_usuarios);
            if($(this).prop('required')) {
                if($(this).val().length < 1) {
                    errores++;
                }
                else{                    
                    if(nombre_elemento=="form_usuario"){
                        for(var i=0;i<arreglo_usuarios.length;i++){
                            if(arreglo_usuarios[i].sys_usuario_usuario==$(this).val()){
                                $('input[name=form_usuario]').val('');
                                $.Notification.autoHideNotify('warning', 'top right', 'Advertencia!!!','Este RUT de usuario ya se encuentra registrado, intente con otro')
                            }
                            else{
                              console.log("no duplicado pasa");
                            }
                        }
                    }
                }
            }            
        });
        return errores;
    }
    function open_modal_usuario(){
        //data-toggle="modal" data-target="#modal_registro_usuario"
        $('#form_reg').trigger("reset");
        $('#modal_registro_usuario').modal('toggle');
        $('#modal_registro_usuario').modal('show');

        console.log("Abre modal crear usuario")
        //$('#myModal').modal('hide');
    }
    $.registrar_usuario = function(){
        $(document).ajaxStop($.unblockUI);
        $.blockUI({message: null,overlayCSS: { backgroundColor: '#007bff'} });

        var data = new FormData(document.forms.namedItem("formulario_registro_usuario"));
        //console.log(data);
        url = "<?php echo base_url(); ?>ModuloAdministracion/CgestorCuentas/registrar_usuario";

        $.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            url: url,                     
            data: data, 
            success: function(result)             
            {
                //$('#result').html(result);
                $('#modal_registro_usuario').modal('hide');                
                if($.fn.DataTable.isDataTable('#tabla_usuarios')){
                   table.ajax.reload(); 
                   //console.log("nose");
                }
                $.Notification.notify('success','right top', 'Usuario creado correctamente', 'Puede asignar los permisos en la siguiente tabla.');
                mostrar_usuarios();
            }
       });
    }

    $('#submit').click(function(){
        $('#submit').attr('disabled');
        if($.validar_formulario() == 0){
            $.registrar_usuario();
            $('#submit').removeAttr('disabled');
            //console.log("es 0");
        }
        if($.validar_formulario_editar() == 0){
            //$.registrar_usuario();
            console.log("editar");
            $('#submit').removeAttr('disabled');
            //console.log("es 0");
        }
        else{
            $('#submit').removeAttr('disabled');
            //console.log("es ++");
        }   
    });
    var table;
    function mostrar_usuarios(){
        var query = $('#tabla_usuarios');
        var isVisible = query.is(':visible');
        if(isVisible==true){
            $('#tabla_usuarios').dataTable().fnDestroy();
            $("#tabla_usuarios").hide();
        }        
        $("#tabla_usuarios").show();
        table = $('#tabla_usuarios').DataTable({
            "order": [[ 0, "desc" ]],
            "key":true,
            "ajax": "<?php echo base_url() ?>ModuloAdministracion/CgestorCuentas/get_registros_usuarios",
            "columns": [
                    { "data": "sys_usuario_ID" },

                    { "data": "sys_usuario_usuario" },
                
                    { "data": "sys_usuario_clave" },
                
                    { "data": "sys_usuario_nombre" },

                    { "data": "sys_usuario_correoElectronico" },
                
                    { "data": "sys_usuario_estadoUsuario" },
                    
                    { "data": "created" },

                    { "data": "updated" },

                    { "defaultContent": "" },

                    { "defaultContent": "" },

                    { "defaultContent": "" },
                ],            
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ){
                $('td:eq(8)', nRow).html( "<div class='btn_permisos' id='btn_permisos'><acronym title='Click para asignar permisos'><button type='button'class='btn btn-success waves-effect waves-light'><i class='mdi mdi-account-check'></i></acronym></button></div>");
                //$('td:eq(8)', nRow).html( "<div id='btn_permisos'><a class='btn btn-success waves-effect waves-light'><i class='mdi mdi-account-check'></i></a></div>" );
                $('td:eq(9)', nRow).html( "<div id='btn_modificar'><a class='btn btn-warning waves-effect waves-light'><i class='mdi mdi-border-color'></i></a></div>" );
                $('td:eq(10)', nRow).html( "<div class='btn_eliminar' id='btn_eliminar'><acronym title='Click para eliminar'><button type='button'class='btn btn-danger waves-effect waves-light'><i class='ion-close-circled'></i></acronym></button></div>");
            },
            columnDefs: [
                { className: 'text-center', targets: [8,9,10] },
            ],
            "deferRender": true
        });
    }
    $('#tabla_usuarios').on( 'click', '#btn_eliminar ', function () {
        console.log("clic eliminar");
        var data = table.row( $(this).parents('tr') ).data();
        var id_usuario=data["sys_usuario_ID"];
        console.log("id_usuario = "+id_usuario);

        swal({
          title: 'Esta seguro que desea eliminar este usuario?',
                text: "Presione aceptar para continuar!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          buttons: ["Cancelar","Aceptar"],
        })
        .then((greeting) => {
          if (greeting==1) {
            swal('Usuario borrado correctamente','', {
              icon: "success",
            });
            var controlador = '../iotsys/ModuloAdministracion/CgestorCuentas/disable_usuario';        
            //$(document).ajaxStop($.unblockUI);
            //$.blockUI({message: null,overlayCSS: { backgroundColor: '#007bff'} });
            $.ajax({
                async:false,    
                cache:false,
                type: "POST",
                url: controlador,
                data: { id_usuario : id_usuario },
                success: function(msg) {
                    if($.fn.DataTable.isDataTable('#tabla_usuarios')){
                       table.ajax.reload();
                    }
                },
                error: function() {
                    alertify.error("Error al editar Permisos");
                }
            });
          } else {
            swal("Operación no realizada!");
            //console.log(greeting);
          }
        });        
    });
    $('#tabla_usuarios').on( 'click', '#btn_modificar ', function () {
        console.log("clic modificar");
        var data = table.row( $(this).parents('tr') ).data();
        var id_usuario=data["sys_usuario_ID"];
        console.log("id_usuario = "+id_usuario);
        var controlador = '../iotsys/ModuloAdministracion/CgestorCuentas/get_info_usuario';
        var respuesta;
        $.ajax({
            async:false,    
            cache:false,
            type: "POST",
            url: controlador,
            data: { id_usuario : id_usuario },
            success: function(msg) {
                //console.log(msg);
                respuesta=JSON.parse(msg);
            },
            error: function() {
                alertify.error("Error al editar Permisos");
            }
        });
        console.log(respuesta);
        var correo = respuesta["datos"][0]["sys_usuario_correoElectronico"].split("@");
        console.log(correo);
        var modal_permisos =''+
        '<div class="row">'+
            '<div class="col-lg-12">'+
                '<div class="card-box" style="background-color: #f7f7f7;">'+
                    '<h4 class="header-title m-t-0">Editar Usuario</h4>'+
                    '<p class="text-muted font-12 m-b-20"></p>'+
                    '<div class="form-group row">'+
                        '<label class="col-2 col-form-label">Usuario</label>'+
                        '<div class="col-10">'+
                            '<input name="form_usuario" type="number" max="99999999" class="form-control" placeholder="Ingrese rut del usuario" value="'+respuesta["datos"][0]["sys_usuario_usuario"]+'" required>'+
                        '</div>'+
                    '</div>'+
                    '<div class="form-group row">'+
                        '<label class="col-2 col-form-label">Nombre</label>'+
                        '<div class="col-10">'+
                            '<input name="form_nombre" type="text" class="form-control" placeholder="Ingrese nombre y apellido del usuario" value="'+respuesta["datos"][0]["sys_usuario_nombre"]+'" required>'+
                        '</div>'+
                    '</div>'+
                    '<div class="form-group row">'+
                        '<label class="col-2 col-form-label">Correo Electrónico</label>'+
                        '<div class="col-10">'+
                            '<div class="input-group">'+
                                '<input name="form_correo_id" type="text" class="form-control" placeholder="Ingrese correo electrónico del usuario" value="'+correo[0]+'" required>'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="basic-addon1">@</span>'+
                                '</div>'+
                                '<input name="form_correo_host" type="text" class="form-control" placeholder="Ingrese casilla correo" value="'+correo[1]+'" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+                                
        '</div>';
        document.getElementById("formulario_editar").innerHTML = modal_permisos;
        $('#modal_editor_usuario').modal('toggle');

        $("submit_editar").attr("onclick", "").unbind("click");
        guardar = document.getElementById("submit_editar");
        guardar.setAttribute('onClick','editarUsuario('+id_usuario+')');
    });
    function editarUsuario(id){
        console.log(id);
        id_usuario=id;
        $(document).ajaxStop($.unblockUI);
        $.blockUI({message: null,overlayCSS: { backgroundColor: '#007bff'} });

        var data = new FormData(document.forms.namedItem("formulario_editar_usuario"));
        data.append("id_usuario", id_usuario) ;

        url = "<?php echo base_url(); ?>ModuloAdministracion/CgestorCuentas/modificar_usuario";
        $.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            url: url,                     
            data: data, 
            success: function(result)            
            {
                console.log(result);
                if(result==0){
                    $.Notification.notify('warning','right middle', 'No se realizaron cambios en el usuario', 'Intente nuevamente.');
                }
                else{
                    $.Notification.notify('success','right middle', 'Usuario editado correctamente');
                }
                $('#modal_editor_usuario').modal('hide');              
                if($.fn.DataTable.isDataTable('#tabla_usuarios')){
                   table.ajax.reload(); 
                   //console.log("nose");
                }
                //$.Notification.notify('success','right middle', 'Usuario creado correctamente', 'Puede asignar los permisos en la siguiente tabla.');
                //mostrar_usuarios();
            }
       });
    }
    var checkboxes = [];
    $('#tabla_usuarios').on( 'click', '#btn_permisos ', function () {
        console.log("clic permisos");
        var data = table.row( $(this).parents('tr') ).data();
        var id_usuario=data["sys_usuario_ID"];
        var usuario=data["sys_usuario_usuario"];
        //console.log("id_usuario = "+id_usuario);
        var controlador = '../iotsys/ModuloAdministracion/CgestorCuentas/get_permisos';
        var respuesta;
        $.ajax({
            async:false,    
            cache:false,
            type: "POST",
            url: controlador,
            data: { id_usuario : id_usuario },
            success: function(msg) {
                //console.log(msg);
                respuesta=JSON.parse(msg);
            },
            error: function() {
                alertify.error("Error al editar Permisos");
            }
        });
        var controlador2 = '../iotsys/ModuloAdministracion/CgestorCuentas/get_permisos_usuario';
        var respuesta2;
        $.ajax({
            async:false,    
            cache:false,
            type: "POST",
            url: controlador2,
            data: { id_usuario : id_usuario },
            success: function(msg) {
                //console.log(msg);
                respuesta2=JSON.parse(msg);
            },
            error: function() {
                alertify.error("Error al editar Permisos");
            }
        });
        var largo_permisos=respuesta["datos"].length;
        var largo_permisos_usuario=respuesta2["datos"].length;
        //checkboxes =new Array(largo_permisos_usuario,largo_permisos);
        checkboxes = [];
        byDimensionalArray(checkboxes, largo_permisos_usuario, largo_permisos);
        //console.log(largo_permisos);
        var modal_permisos =''+
        '<div class="panel panel-default">'+
            '<table class="table table-bordered" style="text-align: center;">'+
                '<thead>'+
                    '<tr>'+
                        '<th colspan="'+(largo_permisos+1)+'" style="text-align:right;">Permisos usuario: '+usuario+'</th>'+
                    '</tr>'+
                    '<tr>'+
                        '<th>#Módulo</th>';
                    for(var l=0;l<largo_permisos;l++){
                        modal_permisos=modal_permisos+
                            '<th  style="text-align: center;">'+respuesta["datos"][l]["sys_tipo_permiso_nombre"]+'</th>';
                    }
                    modal_permisos=modal_permisos+
                    '</tr>'+
                '</thead>'+
                '<tbody>';                        
                    for(var i=0;i<largo_permisos_usuario;i++){
                        modal_permisos=modal_permisos+
                        '<tr>'+
                            '<th scope="row">'+respuesta2["datos"][i]["sys_submenu_nombre"]+'</th>';                                
                            var string = respuesta2["datos"][i]["permisos"];
                            if (string !== null){ 
                                var array = string.split(",");
                            }
                            else{
                                array=null;
                            }
                            var control=0;
                            for(var j=0;j<largo_permisos;j++){
                                if (string !== null){ 
                                    for(var k=0;k<array.length;k++){
                                        if(array[k]==respuesta["datos"][j]["sys_tipo_permiso_ID"]){
                                            checkboxes[i][j]=1;
                                            modal_permisos=modal_permisos+
                                            '<td>'+
                                                '<div class="form-check">'+
                                                    '<input type="checkbox"  id="check_m_'+respuesta2["datos"][i]["sys_submenu_ID"]+"_p_"+respuesta["datos"][j]["sys_tipo_permiso_ID"]+'" checked>'+
                                                '</div>'+
                                            '</td>';
                                            control=1;
                                        }
                                    }
                                }
                                if(control==0){
                                    //checkboxes[j][k]=2;
                                    modal_permisos=modal_permisos+
                                    '<td>'+
                                        '<div class="form-check">'+
                                            '<input type="checkbox" id="check_m_'+respuesta2["datos"][i]["sys_submenu_ID"]+"_p_"+respuesta["datos"][j]["sys_tipo_permiso_ID"]+'">'+
                                        '</div>'+
                                    '</td>';                                            
                                }
                                control=0;
                            }
                        modal_permisos=modal_permisos+
                        '</tr>';
                    }      
                modal_permisos=modal_permisos+    
                '</tbody>'+
            '</table>'+
        '</div>';
        document.getElementById("formulario_permiso").innerHTML = modal_permisos;

        

        $('#modal_permiso_usuario').modal('toggle');        
        console.log(checkboxes); 
        $("submit_permisos").attr("onclick", "").unbind("click");
        guardar = document.getElementById("submit_permisos");
        //guardar.addEventListener('click',cambioCheck(1));
        guardar.setAttribute('onClick','cambioCheck('+id_usuario+')');
        //guardar.onclick=cambioCheck(1);

        
    });
    function byDimensionalArray(arr, rows, columns){
        for (var i = 0; i < rows; i++) {
            arr.push([0]);
            for (var j = 0; j < columns; j++) {
                arr[i][j] = 0;
            }
        }
    }
    function cambioCheck(dsa){
        console.log("id:"+dsa);
        var checkedValue = null;
        var inputElements = null; 
        var chesk=[];
        var allChecksBoxes = document.querySelectorAll('input[type="checkbox"]');
        var chkVacio = [].filter.call(allChecksBoxes, function(el) {
            //console.log(el.checked);
            chesk.push(el.checked);
        });

        var matrix = listToMatrix(chesk,6);

        console.log(chesk);
        console.log(matrix);
        var naryu=new Array(2);
        naryu[0]=new Array(2);
        naryu[1]=new Array(6);
        for(var i=0;i<matrix.length;i++){
            for(var j=0;j<matrix[0].length;j++){
                if(matrix[i][j]==true){
                    matrix[i][j]=(j+1);
                }
                else{
                    matrix[i][j]=0;
                }
                //console.log("-----"+matrix[i][j]);
            }
        }
        console.log(matrix);
        //console.log(JSON.stringify(matrix));
        var jhijo=JSON.stringify(matrix);
        url = "<?php echo base_url(); ?>ModuloAdministracion/CgestorCuentas/modificar_permisos";
        $.ajax({
            type: "POST",
            url: url,                     
            data: {data:jhijo,user:dsa}, 
            success: function(result)             
            {
                if(result==0){
                    $.Notification.notify('warning','right top', 'No se realizaron cambios en los permisos', 'Puede asignar en el boton permisos.');
                }
                else{
                    $.Notification.notify('success','right top', 'Permisos asignados correctamente', 'Puede editar estos permisos en cualquier momento.');
                }
                $('#modal_permiso_usuario').modal('hide'); 
                //$('#result').html(result);
                $('#modal_registro_usuario').modal('hide');                
                if($.fn.DataTable.isDataTable('#tabla_usuarios')){
                   table.ajax.reload(); 
                   //console.log("nose");
                }
                //$.Notification.notify('success','right middle', 'Usuario creado correctamente', 'Puede asignar los permisos en la siguiente tabla.');
                mostrar_usuarios();
            }
       });
    }
    function listToMatrix(list, elementsPerSubArray) {
        var byarray = [], i, k;

        for (i = 0, k = -1; i < list.length; i++) {
            if (i % elementsPerSubArray === 0) {
                k++;
                byarray[k] = [];
            }

            byarray[k].push(list[i]);
        }

        return byarray;
    }

</script>