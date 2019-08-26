<div class="row">
    <div class="col-sm-12" id="bread">

<?php 

	if($breadcrumb_modulo == 'Inicio')
	{
		echo '<div class="page-title-box" >
			    <div class="btn-group pull-right">
			        <ol class="breadcrumb hide-phone p-0 m-0">
			            <li class="breadcrumb-item"><a href="#">'.$breadcrumb_titulo.'</a></li>
			            <li class="breadcrumb-item active">'.$breadcrumb_submenu.'</li>
			        </ol>
			    </div>
			    <h4 class="page-title">'.$breadcrumb_submenu.'</h4>
			</div>';
	}
	else
	{
		echo '<div class="page-title-box" >
			    <div class="btn-group pull-right">
			        <ol class="breadcrumb hide-phone p-0 m-0">
			            <li class="breadcrumb-item"><a href="#">'.$breadcrumb_titulo.'</a></li>
			            <li class="breadcrumb-item"><a href="#">'.$breadcrumb_modulo.'</a></li>
			            <li class="breadcrumb-item"><a href="#">'.$breadcrumb_menu.'</a></li>
			            <li class="breadcrumb-item active">'.$breadcrumb_submenu.'</li>
			        </ol>
			    </div>
			    <h4 class="page-title">'.$breadcrumb_submenu.'</h4>
			</div>';
	}
?>
    </div>
</div>