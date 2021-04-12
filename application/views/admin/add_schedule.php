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
								<form id="generate-schedule-form" action="<?php echo base_url() ?>schedule/generate" method="post" enctype="multipart/form-data">
									<div class="card card-custom gutter-b">
										
										<div class="card-body"> 
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Vaccination Site<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<select name="vaccination_site" class="form-control" >
														<option value="">Select</option>
														<?php
															foreach ($vaccination_site as $row) {
																echo '
																	<option value="'.$row['vaccination_site_id'].'">'.$row['vaccination_site'].'</option>';
															}
														?>

													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Date<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input type="text" id="date" value="06/06/2021" placeholder="mm/dd/yyyy"  class="form-control input-sm"  name="date"  autocomplete="off" />
												</div>
											</div>
											<div class="text-right">
												<a href="<?php echo base_url(); ?>schedule" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Back</a>
												<button type="button" id="generate-schedule-btn" class="btn btn-info"> <i class="far fa-calendar-alt"></i>  Generate</button>
												<button type="button" id="insert-schedule-btn" class="btn btn-primary">  Save Schedule</button>
												
											</div>
											<hr>
											<div class="row"> 
												<div class="col-12"> 
													<h2>Schedule</h2> 
													<table class="table table-sm" id="generate-schedule-table">
														<thead>
															<tr>
																<th>#</th> 
																<th>Barangay</th> 
																<th>Purok</th> 
																<th>Name</th>
																<th>Contact #</th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
													
												</div>
												
											</div>
										</div> 
										<div class="card-footer">
											
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

	<script src="<?php echo base_url(); ?>dist/assets/js/add_schedule.js"></script> 
	<script type="text/javascript">
		(function ($) { 
			$("#date").datepicker({
				dateFormat: 'dd/mm/yy',
			}); 
		})(jQuery);
	</script>

	</body>
</html>