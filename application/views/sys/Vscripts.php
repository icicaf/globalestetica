
<!-- Popper for Bootstrap -->
<!-- Tether for Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>


<!--<script src="<?php echo base_url(); ?>assets/rwd-table/rwd-table.js"></script> -->

<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url(); ?>assets/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/buttons.print.min.js"></script>

<!-- Key Tables -->
<script src="<?php echo base_url(); ?>assets/datatables/dataTables.keyTable.min.js"></script>

<!-- Responsive examples -->
<script src="<?php echo base_url(); ?>assets/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/responsive.bootstrap4.min.js"></script>

<!-- Selection table -->
<script src="<?php echo base_url(); ?>assets/datatables/dataTables.select.min.js"></script>

<!-- Notificaciones Pop -->
<script src="<?php echo base_url(); ?>assets/notify/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/notify/notify-metro.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>

<!-- Script Graficos INICIO 
<script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
-->
<script src="<?php echo base_url(); ?>assets/circliful/jquery.circliful.min.js"></script>
<!--
<script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/skycons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
-->

<!-- Parsleyjs -->
<script src="<?php echo base_url(); ?>assets/parsley/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/inputmask/bootstrap-inputmask.min.js"></script>

<!-- Parsleyjs -->
<script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXvImwgYOG85ASLguXtToy8Gt44SwsYqQ" async defer></script>

<!-- Dropzone js -->
<link href="<?php echo base_url(); ?>/assets/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>/assets/dropzone/dropzone.js"></script>

<script src="<?php echo base_url(); ?>/assets/chartjs/chart.js"></script>

<!-- <script type="text/javascript">
  function alterna_modo_de_pantalla() 
  {
    if((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen))
    {
      if(document.documentElement.requestFullScreen)
      {
        document.documentElement.requestFullScreen();
      }
      else if(document.documentElement.mozRequestFullScreen)
      {
        document.documentElement.mozRequestFullScreen();
      }
      else if(document.documentElement.webkitRequestFullScreen)
      {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    }
    else
    {
      if(document.cancelFullScreen) 
      {
        document.cancelFullScreen();
      }
      else if(document.mozCancelFullScreen)
      {
        document.mozCancelFullScreen();
      } 
      else if(document.webkitCancelFullScreen)
      {
        document.webkitCancelFullScreen();
      }
    }
  }

 // document.addEventListener("keyup", keyUpTextField, false);

  // function keyUpTextField (e) 
  // {
  //   var keyCode = e.keyCode;
  //   if(keyCode==122)
  //   {
  //     alterna_modo_de_pantalla();
  //   }
  // }
</script> -->

<script type="text/javascript">

(function() {
  function formatTime(n) {
    return (n < 10) ? "0" + n : n;
  };

  function checkTime() {
    var today = new Date(),
  
        day = ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sáb"],
        month = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
    
        h = formatTime(today.getHours()),
        min = formatTime(today.getMinutes()),
        seg = formatTime(today.getSeconds()),
        hour = h,
        w = "a.m.";
   
    if (hour >= 12) {
      hour = formatTime(hour - 12);
      w = "p.m.";
    };
  
    if (hour == 0) {
      hour = 12;
    };
   
    document.getElementById("box-date").innerHTML = "<span>" + day[today.getDay()] + ", " + today.getDate() + " " + month[today.getMonth()] + " " +  today.getFullYear() + "</span>"; 
    document.getElementById("box-time").innerHTML = "<span class='hm-time'>" + hour + ":" + min + "</span> <span class='s-time'>" + seg + "</span> <span class='f-time'>" + w + "</span>";
  
    var d = setTimeout(function() {
      checkTime()
    }, 500);
  };
 
  checkTime();
})();

</script>