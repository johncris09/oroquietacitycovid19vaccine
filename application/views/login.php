
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<link href="<?php echo base_url(); ?>dist/assets/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />
		
		<link href="<?php echo base_url() ?>dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url() ?>dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url() ?>dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<link rel="shortcut icon" href="<?php echo base_url(); ?>dist/assets/media/logos/favicon.ico" />

	</head>

	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<div class="d-flex flex-column flex-root">
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">

				<div class="login-aside order-2 d-flex flex-row-auto position-relative overflow-hidden">
					<div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
						<a href="#" class="text-center pt-2">
							<img src="<?php echo base_url(); ?>dist/assets/media/img/login.png" class="max-h-50px " id="logo" alt="logo" />
						</a>
						<div class="d-flex flex-column-fluid flex-column flex-center">
							<div class="login-form login-signin py-11 mb-10"> 
								<form class="form" id="login-form" action="<?php echo base_url(); ?>login/login" method="post">
									<div class="text-center pb-8">
										<h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h2> 
									</div>
									<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Username</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"> <i class="fa fa-user text-primary"></i>	</span>
											</div>
											<input class="form-control  h-auto py-7 px-6  " type="text" name="username" autocomplete="off" autofocus="" />
										</div>
									</div>
									<div class="form-group">
										<div class="d-flex justify-content-between mt-n5">
											<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
										</div>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"> <i class="fa fa-key text-primary"></i>	</span>
											</div>
											<input  class="form-control  h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
										</div>
									</div>
									<div class="pt-2">
										<button type="button" id="login-btn" class="btn btn-primary btn-block font-weight-bolder font-size-h6 px-8 py-4 my-3"> <i class="fas fa-user"></i> Sign In</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
   
				<div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-image: url('<?php echo base_url() ?>dist/assets/media/img/vaccine.png'); background-repeat: no-repeat;">
				</div>
			 

			</div>
		</div>

		<script>var BASE_URL = "<?php echo base_url(); ?>";</script>

		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		

		<script src="<?php echo base_url(); ?>dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo base_url(); ?>dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="<?php echo base_url(); ?>dist/assets/js/scripts.bundle.js"></script> 

		<script src="<?php echo base_url(); ?>dist/assets/js/login.js"></script> 
		 

	</body>

</html>