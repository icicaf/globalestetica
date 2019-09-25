<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class' => 'form-control',
	'required' => '',
	'placeholder' => 'Enter your email',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' => 'form-control',
	'required' => '',
	'placeholder' => 'Enter your email',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control',
	'placeholder' => 'Ingrese el código de confirmación'
);
?>

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

        <!-- App css -->
        <link href="<?php echo base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" id="main-style-container" />
    	
    	<style type="text/css">
			img {
				display:block;
				margin:auto;
			}
		</style>

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
                            <a href="<?php echo base_url(); ?>">
                                <span><img src="<?php echo base_url(); ?>/assets/images/logo_sys.png" alt="" height="50"></span>
                            </a>
                        </div>
                      
                        <!-- title -->
						<h4 class="mt-0">Iniciar sesión</h4>
                        <!--<p class="text-muted mb-4">Ingrese su usuario y contraseña para acceder al sistema.</p>-->

						<?php echo form_open($this->uri->uri_string()); ?>
						 <div class="form-group">
						 	<label><?php echo form_label($login_label, $login['id'], 'form-control'); ?></label>
							<?php echo form_input($login); ?>
							<p style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></p>
						</div>
						<div class="form-group">
							<label><?php echo form_label('Password', $password['id']); ?></label>
							<?php echo form_password($password); ?>
							<p style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></p>
						</div>

			<?php 
				if ($show_captcha) 
				{
					if ($use_recaptcha) 
					{ 
			?>
						<div class="form-group text-center">
							
							<div id="recaptcha_image"></div>
							
							<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
							<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
							<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
							<div class="recaptcha_only_if_image">Enter the words above</div>
							<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
							<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
							<p style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></p>
							<?php echo $recaptcha_html; ?>
						</div>

				<?php 
					} 
					else 
					{ 

					?>
						<div class="form-group" >
								<!--<p>Enter the code exactly as it appears:</p> -->
							<p><?php echo $captcha_html; ?></p>
						
							<?php echo form_input($captcha); ?>
							<label style="color: red;"><?php echo form_error($captcha['name']); ?></label>
						</div>
			<?php 
					}
				}	 
			?>
						<?php //echo form_checkbox($remember); ?>
						<?php //echo form_label('Remember me', $remember['id']); ?>
						<?php //if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
						<div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Iniciar sesión </button>
                            </div>
						</form>

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">¿Olvido su contraseña? <a href="<?php echo base_url(); ?>/pages-register-2.html" class="text-muted ml-1"><b>Restablecer contraseña</b></a></p>

                            <?php //echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
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

        <!-- App js 
        echo base_url(); ?>/assets/js/app.js"></script> 
        -->


	</body>
</html>