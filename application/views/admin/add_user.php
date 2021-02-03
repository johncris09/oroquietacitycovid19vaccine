<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->view('template/meta-info.php'); ?>
		<?php $this->view('template/css-link.php'); ?>
		<style>
			input[type="radio"]:checked+label { font-weight: bold; }
		</style>

	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<?php $this->view('template/header-mobile.php'); ?>
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
				<?php $this->view('template/aside-left.php'); ?>
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<?php $this->view('template/header.php'); ?>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<div class="d-flex align-items-center flex-wrap mr-1">
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<h5 class="text-dark font-weight-bold my-1 mr-5"><?php echo $page_title; ?></h5>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex flex-column-fluid">
							<div class="container">
								<div class="alert alert-custom alert-notice alert-light-danger fade show mb-5" role="alert">
									<div class="alert-icon">
										<i class="flaticon-warning"></i>
									</div>
									<div class="alert-text"> <span class="font-weight-bolder">Note:</span>  <span class="text-danger font-weight-bolder">*</span> is required.</div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">
												<i class="ki ki-close"></i>
											</span>
										</button>
									</div>
								</div>
								<form id="add-user-form" action="<?php echo base_url() ?>user/insert" method="post" enctype="multipart/form-data">
									<div class="card card-custom gutter-b">
										<div class="card-header py-3">
											<div class="card-title">
												<h3 class="card-label"><?php echo $page_title; ?></h3>
											</div>
											 
										</div>
										<div class="card-body">  
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Last Name<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="text" name="lastname" placeholder="Last Name" autocomplete="off" autofocus="" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">First Name<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="text" name="firstname" placeholder="First Name" autocomplete="off" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Middle Name </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="text" name="middlename" placeholder="Middle Name" autocomplete="off" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Username<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="text" name="username" placeholder="Username" autocomplete="off" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Password<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="password" name="password" placeholder="Password" autocomplete="off" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Role Type<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<select name="roletype" class="form-control" >
														<option value="">Select</option>
														<?php
															foreach ($this->config->item('role_type') as $row) {
																echo '
																	<option value="'.$row.'">'.$row.'</option>';
															}
														?>

													</select>
												</div>
											</div>

										</div> 
										<div class="card-footer">
											<div class="text-right">
												<a href="<?php echo base_url(); ?>user" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Back</a>
												<button type="button" id="save-btn" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
												
											</div>
										</div>
									</div> 
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $this->view('template/footer.php'); ?>
	
	<?php $this->view('template/quick-panel.php'); ?>
	<?php $this->view('template/js-src.php'); ?>

	<script src="<?php echo base_url(); ?>dist/assets/js/add_user.js"></script> 
	<script type="text/javascript">
	</script>

	</body>
</html>