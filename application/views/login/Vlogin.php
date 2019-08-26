<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SSSI-OPSI - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="" />

        <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico">

        <!-- inline style to handle loading of various element-->
        <style>body.loading {visibility: hidden;}</style>

        <!-- third party css -->
        <link href="<?php echo base_url(); ?>/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?php echo base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" id="main-style-container" />
    </head>
    <body>

        <body class="auth-fluid-pages pb-0">

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <a href="<?php echo base_url(); ?>/index.html">
                                <span><img src="assets/images/logo_sys.png" alt="" height="80"></span>
                            </a>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Iniciar cesión</h4>
                        <p class="text-muted mb-4">Ingrese su usuario y contraseña para acceder al sistema.</p>

                        <!-- form -->
                        <form action="#">
                            <div class="form-group">
                                <label for="emailaddress">Usuario</label>
                                <input class="form-control" type="email" id="emailaddress" required="" placeholder="Ingrese su usuario">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" required="" id="password" placeholder="Ingrese su contraseña">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">Recordar mis credenciales.</label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Iniciar cesión </button>
                            </div>
                            
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">¿Olvido su contraseña? <a href="<?php echo base_url(); ?>/pages-register-2.html" class="text-muted ml-1"><b>Restablecer contraseña</b></a></p>

                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Belleza y salud en un solo lugar</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Centro Estético y Rehabilitación integral personalizada, al servicio del cuidado Corporal y Facial. <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        Maipu 761, Antofagasta - Versión del sistema v1.0.0
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
	</body>
</html>