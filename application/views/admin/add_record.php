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
								<form id="record-form" action="<?php echo base_url() ?>record/insert" method="post" enctype="multipart/form-data">
									<div class="card card-custom gutter-b">
										<div class="card-body"> 
																					
											<!-- <div class="d-flex justify-content-around">
												<div class="d-flex flex-column">
													<img src="<?php echo base_url(); ?>dist/assets/media/img/city-logo.png" width="80" alt="Oroquieta City Logo">
												</div>
												<div class="d-flex flex-column text-center">
												  <div class="p-1 h4 font-weight-bolder">COVID-19 Vaccine Pre-Registration Program</div> 
												  <div class="p-1 h5 font-weight-bolder">OROQUIETA CITY</div> 
												</div>
												<div class="d-flex flex-column">
													<img src="<?php echo base_url(); ?>dist/assets/media/img/city-health.jpg" width="80" alt="City Health Logo">
												</div>
											</div> -->


											<!-- PERSONAL INFORMATION -->
											<div class="d-flex flex-column bg-info mt-2 text-white font-weight-bolder mb-2">
											    <div class="p-2">PERSONAL INFORMATION</div>
											</div> 

											<div class="form-group row">
												<div class="col-lg-3 col-xl-3">
													<label>Lastname<span class="text-danger">*</span> </label>
													<input type="text" name="lastname" class="form-control input-sm" placeholder="Last Name" />
												</div>
												<div class="col-lg-3 col-xl-3">
													<label>Firstname<span class="text-danger">*</span></label>
													<input type="text" name="firstname" class="form-control input-sm" placeholder="First Name" />
												</div>
												<div class="col-lg-3 col-xl-3">
													<label>Middlename</label>
													<input type="text" name="middlename" class="form-control input-sm" placeholder="Middle Name" />
												</div>
												<div class="col-lg-3 col-xl-3">
													<label>Gender<span class="text-danger">*</span></label>
													<div class="radio-inline">
														<label class="radio radio-square">
														<input type="radio" name="gender" value="Male"    />
														<span></span>M</label>
														<label class="radio radio-square">
														<input type="radio" name="gender"  value="Female"    />
														<span></span>F</label>
													</div> 
												</div>
											</div>
											<div class="form-group row">
												<div class="col-lg-4 col-xl-4">
													<label class="text-sm">Purok<span class="text-danger">*</span></label>
													<select name="purok" class="form-control" >
														<option value="">Select</option>
														<?php
														foreach ($this->config->item('purok') as $row) {
															echo '
																<option value="'.$row.'">'.$row.'</option>';
														}
														?>

													</select>
												</div>
												<div class="col-lg-4 col-xl-4">
													<label class="text-sm">Street</label>
													<input type="text" class="form-control input-sm" name="street" placeholder="Street" />
												</div>
												<div class="col-lg-4 col-xl-4">
													<label class="text-sm">Barangay<span class="text-danger">*</span></label>
													<select name="barangay" class="form-control" >
														<option value="">Select</option>
														<?php
														foreach ($this->config->item('barangay') as $row) {
															echo '
																<option value="'.$row.'">'.$row.'</option>';
														}
														?>

													</select>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-lg-3 col-xl-3">
													<label>Are you a registered voter?<span class="text-danger">*</span></label>
													<div class="radio-inline">
														<label class="radio radio-square">
														<input type="radio" name="registeredvoter" value="Yes"    />
														<span></span>Yes</label>
														<label class="radio radio-square">
														<input type="radio" name="registeredvoter"  value="No"    />
														<span></span>No</label>
													</div> 
												</div>
												<div class="col-lg-3 col-xl-3">
													<label class="text-sm">Government ID<span class="text-danger">*</span></label>
													<select name="governmentissuedid" class="form-control" >
														<option value="">Select</option>
														<?php
														foreach ($this->config->item('government_id') as $row) {
															echo '
																<option value="'.$row.'">'.$row.'</option>';
														}
														?>

													</select>
												</div>
												<div class="col-lg-3 col-xl-3">
													<label class="text-sm">ID Number<span class="text-danger">*</span></label>
													<input type="text" class="form-control input-sm" name="idnumber" placeholder="ID Number" autocomplete="off" />
												</div>
												<div class="col-lg-3 col-xl-3">
													<label class="text-sm">Contact #<span class="text-danger">*</span></label>
													<input type="text" class="form-control input-sm" name="contactnumber" placeholder="Contac #" />
												</div>
											</div>

											<div class="form-group row">
												<div class="col-lg-3 col-xl-3">
													<label class="text-sm">Birthdate<span class="text-danger">*</span></label>
													<input type="date" class="form-control input-sm"  name="birthdate"  />
												</div>
												<div class="col-lg-1 col-xl-1">
													<label class="text-sm">Age</label>
													<input type="text" class="form-control input-sm" name="age" placeholder="0" readonly="" disabled="" />
												</div>
												<div class="col-lg-3 col-xl-3">
													<label class="text-sm">Occupation<span class="text-danger">*</span></label>
													<input type="text" class="form-control input-sm" placeholder="Occupation" name="occupation"  />
												</div>
											</div>
 
											<hr>
											<!-- MEDICAL HISTORY -->
											<div class="d-flex flex-column bg-info mt-2 text-white font-weight-bolder">
											    <div class="p-2">MEDICAL HISTORY</div>
											</div>
											<?php 

												$medical_history = $this->config->item('medical_history');
												foreach ($medical_history as $row) {
													if($row['multiple_choice']){

														echo '
															<div class="d-flex p-2">Mayroon/Nagkaroon ka ba ng mga sumumsunod na karamdaman?</div>
															<div class="form-group row">';
																foreach ($row['choices'] as $choice) {
																	foreach ($choice as  $chk) {
																		echo '
																			<div class="col-6 col-form-label">
																				<div class="checkbox-list">
																					<label class="checkbox checkbox-square">
																					<input type="checkbox"  value="'.$chk['value'].'" name="'.$row['optname'].'" />
																					<span></span>'.$chk['text'].'</label>
																				</div>
																			</div>';
																	}
																	 
																}

													echo '</div> ';

													}else{
														echo '
															<div class="d-flex justify-content-between border">
																<div class="d-flex flex-row">
																	<div class="p-2">'.$row['question'].'</div>
																</div>
																<div class="d-flex flex-row">
																	<div class="radio-inline">';
																	foreach ($row['choices'] as $choice) {
																		foreach ($choice as  $opt) {
																			if($opt['value'] == 0){
																				echo '
																		            <label class="radio radio-square">
																		            <input type="radio" checked="checked" id="'.$row['txtname'].'" name="'.$row['optname'].'" value="'.$opt['value'].'"  />
																		            <span></span>'.$opt['text'].'</label>';
																			}else{
																				echo '
																		            <label class="radio radio-square">
																		            <input type="radio"  id="'.$row['txtname'].'" name="'.$row['optname'].'" value="'.$opt['value'].'"  />
																		            <span></span>'.$opt['text'].'</label>';
																			}
																		}
																		
																	}
														echo '
																		<input type="hidden"  name="'.$row['txtname'].'">
																	</div>
																</div>
															</div>';
													}
													
												}
												
											?> 

										</div> 
										<div class="card-footer">
											<div class="text-right">
												<a href="<?php echo base_url(); ?>record" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Back</a>
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

	<script src="<?php echo base_url(); ?>dist/assets/js/add_record.js"></script> 
	<script type="text/javascript">
		(function ($) {
			
			$(document).on('click', 'input[type="radio"]',function(){
				var txtname = $(this).attr('id')
				var val = $(this).val()

				$('input[name="'+txtname+'"]').val(val)
				// $($(this).attr('id')).val($(this).val())
			});
		})(jQuery);
	</script>

	</body>
</html>