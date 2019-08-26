<script>
    $('#moduloInicio_resumen').click(function() {
        console.log("Inicio Resumen del Sistema");
        var url = "<?php echo base_url(); ?>../CmoduloInicio/Cinicio";
        $(document).ajaxStop($.unblockUI);
        $.blockUI({message: null,overlayCSS: { backgroundColor: '#007bff'} });
        $("#bodycentral").load(url, function(response,status, xhr) {});
    });
</script>