<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <!-- Head -->
    <?php echo $html_head; ?>
    <!-- Fin Head -->
    
    <body id="id_body">
        <!-- Navigation Bar-->
        <header id="topnav">
            <?php ECHO $html_topbar; ?>
            <?php ECHO $html_topmenu; ?>
        </header>
        <!-- End Navigation Bar-->

        <div class="wrapper">
            <div class="container-fluid">
                <?php ECHO $html_breadcrumb; ?>                
                <!-- end breadcrumb -->
                <?php ECHO $html_bodycentral; ?>
                <!-- end bodycentral -->
            </div> 
            <!-- end container -->
        </div>
        <!-- end wrapper -->
        <?php echo $html_footer; ?>
        <!-- End Footer -->
        <?php echo $html_scripts; ?>
        <!-- End Script MCA -->
    </body>
</html>