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

								<form id="update-record-form"  action="<?php echo base_url() ?>record/update/<?php echo $record['id']; ?>" method="post"  enctype="multipart/form-data">
									<div class="card card-custom gutter-b">
										<div class="card-body"> 
											<!-- PERSONAL INFORMATION -->
											<div class="d-flex flex-column bg-info mt-2 text-white font-weight-bolder mb-2">
											    <div class="p-2">PERSONAL INFORMATION</div>
											</div>
											<div id="personal-information">
												<div class="form-group row">
													<div class="12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label>Last Name<span class="text-danger">*</span> </label>
														<input type="text" name="lastname" value="<?php echo ucwords($record['lastname']); ?>" class="form-control input-sm" placeholder="Last Name" />
													</div>
													<div class="12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label>First Name<span class="text-danger">*</span></label>
														<input type="text" name="firstname" value="<?php echo ucwords($record['firstname']); ?>" class="form-control input-sm" placeholder="First Name" />
													</div>
													<div class="12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label>Middle Name</label>
														<input type="text" name="middlename" value="<?php echo ucwords($record['middlename']); ?>" class="form-control input-sm" placeholder="Middle Name" />
													</div>
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label>Gender<span class="text-danger">*</span></label>
														<div class="radio-inline">
															<label class="radio radio-square">
															<input type="radio" name="gender" <?php echo ucwords($record['gender']) == "Male"  ? "checked='checked'" : "" ?> value="Male"    />
															<span></span>M</label>
															<label class="radio radio-square">
															<input type="radio" name="gender"  <?php echo ucwords($record['gender']) == "Female"  ? "checked='checked'" : "" ?>  value="Female"    />
															<span></span>F</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Purok<span class="text-danger">*</span></label>
														<select name="purok" class="form-control" >
															<option value="">Select</option>
															<?php 
																foreach ($this->config->item('purok') as $row) {
																	$selected = ($row == $record['purok']) ? 'selected="selected"' : '' ; 
																	echo '
																		<option value="'.$row.'" '.$selected.' >'.$row.'</option>';
																}
															?>

														</select>
													</div>
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Street</label>
														<input type="text" class="form-control input-sm" value="<?php echo ucwords($record['street']); ?>" name="street" placeholder="Street" />
													</div>
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Barangay<span class="text-danger">*</span></label>
														<select name="barangay" class="form-control" >
															<option value="">Select</option>
															<?php
															foreach ($this->config->item('barangay') as $row) {
																	$selected = ($row == $record['barangay']) ? 'selected="selected"' : '' ; 
																echo '
																	<option value="'.$row.'"  '.$selected.' >'.$row.'</option>';
															}
															?>

														</select>
													</div>
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Contact #</label>
														<input type="text" class="form-control input-sm" name="contactnumber"  value="<?php echo ucwords($record['contactnumber']); ?>"  placeholder="Contact #" />
													</div>
												</div>

												<div class="form-group row">
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Birthdate<span class="text-danger">*</span></label> 
														<input type="text" placeholder="mm/dd/yyyy" id="birthdate" value="<?php echo date('m/d/Y', strtotime( $record['birthdate'])); ?>" class="form-control input-sm"  name="birthdate"  autocomplete="off" />
													</div>

													<div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
														<?php
															$birthDate = date('m/d/Y', strtotime($record['birthdate']));
															$birthDate = explode("/", $birthDate);
															$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
															    ? ((date("Y") - $birthDate[2]) - 1)
															    : (date("Y") - $birthDate[2]));
														?>
														<label class="text-sm">Age</label>
														<input type="text" class="form-control input-sm" name="age" value="<?php echo $age; ?>" placeholder="0" readonly="" disabled="" />
													</div> 

													<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
														<label class="text-sm">Occupation<span class="text-danger">*</span></label>
														<select name="occupation" class="form-control" >
															<option value="">Select</option>
															<?php
															foreach ($this->config->item('occupation') as $row) {
																$selected = ($row == $record['occupation']) ? 'selected="selected"' : '' ; 
																echo '
																	<option value="'.$row.'" '.$selected.' >'.$row.'</option>';
															}
															?>

														</select>
													</div>
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Position</label>
														<input type="text" class="form-control input-sm" value="<?php echo ucwords($record['position']); ?>"  placeholder="Position" name="position"  />
													</div>
												</div>
												<div class="form-group row"> 
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label>Are you a registered voter?<span class="text-danger">*</span></label>
														<div class="radio-inline">
															<label class="radio radio-square">
															<input type="radio" name="registeredvoter"  <?php echo ucwords($record['registeredvoter']) == "1"  ? "checked='checked'" : "" ?> value="1"    />
															<span></span>Yes</label>
															<label class="radio radio-square">
															<input type="radio" name="registeredvoter"   <?php echo ucwords($record['registeredvoter']) == "0"  ? "checked='checked'" : "" ?>   value="0"    />
															<span></span>No</label>
														</div> 
													</div>
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Government ID</label>
														<select name="governmentissuedid" class="form-control" >
															<option value="">Select</option>
															<?php
															foreach ($this->config->item('government_id') as $row) {
																$selected = ($row == $record['governmentissuedid']) ? 'selected="selected"' : '' ; 
																echo '
																	<option value="'.$row.'" '.$selected.' >'.$row.'</option>';
															}
															?>

														</select>
													</div>
													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">ID Number</label>
														<input type="text" class="form-control input-sm" name="idnumber"  value="<?php echo ucwords($record['idnumber']); ?>"  placeholder="ID Number" autocomplete="off" />
													</div>

													<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
														<label class="text-sm">Date Registered<span class="text-danger">*</span></label>
														<input type="text"  value="<?php echo date('m/d/Y', strtotime($record['date_registered'])); ?>" id="date-registered" class="form-control input-sm"  name="date_registered"  autocomplete="off" />
													</div>
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
															<div class="d-flex p-2">'.$row['question'].'</div>
															<div class="form-group row">';

																foreach ($row['choices'] as $choice) {
																	foreach ($choice as  $chk) {
																		if($row['optname'] == 'OptionIllness_1[]'){
																			$illness = explode(',', $record['optionIllness_1']);
																			$illness = array_map('trim', $illness);
																			$checked =   in_array($chk['value'], $illness) ? 'checked="checked"' :'';

																		
																			echo '
																				<div class="col-6 col-form-label">
																					<div class="checkbox-list">
																						<label class="checkbox checkbox-square">
																						<input type="checkbox"  value="'.$chk['value'].'" name="'.$row['optname'].'" '.$checked.' />
																						<span></span>'.$chk['text'].'</label>
																					</div>
																				</div>';

																		}else{
																			$illness = explode(',', $record['optionIllness_2']);
																			$illness = array_map('trim', $illness);
																			$checked =   in_array($chk['value'], $illness) ? 'checked="checked"' :'';
																		
																			echo '
																				<div class="col-6 col-form-label">
																					<div class="checkbox-list">
																						<label class="checkbox checkbox-square">
																						<input type="checkbox"  value="'.$chk['value'].'" name="'.$row['optname'].'" '.$checked.' />
																						<span></span>'.$chk['text'].'</label>
																					</div>
																				</div>';

																		}
																		
																	}
																	 
																}
														if($row['optname'] == "OptionIllness_2[]"){
															if( !empty($record['other_illness']) || is_null( $record['other_illness'] ) ){
																$checked = "checked='checked'";
															}else{
																$checked = "";
															}
															echo '
																<div class="col-6 col-form-label ">
																	<div class="checkbox-list">
																		<label class="checkbox checkbox-square">
																		<input type="checkbox" '.$checked.' id="chck-illness" value="" name="OptionIllness_2[]" />
																		<span></span>Ubang Sakit</label> 
																		<input class="form-control float-right" type="text" name="other_illness" value="'.$record['other_illness'].'" id="other-illness" />
																	</div>
																</div> 
																 
															';
														}


													echo '

														</div> ';

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
																			$checked =  $record[strtolower($row['txtname'])] == $opt['value'] ? 'checked="checked"' :'';
																			echo '
																	            <label class="radio radio-square">
																	            <input type="radio"  id="'.$row['txtname'].'" name="'.$row['optname'].'" value="'.$opt['value'].'"  '.$checked.' />
																	            <span></span>'.$opt['text'].'</label>';
																		}
																		
																	}
														echo '
																		<input type="hidden"  name="'.$row['txtname'].'" value="'.$record[strtolower($row['txtname'])].'">
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
												<button type="button" id="update-record-btn" class="btn btn-primary"> <i class="fas fa-save"></i> Update</button>
												
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

	<script src="<?php echo base_url(); ?>dist/assets/js/edit_record.js"></script> 
	<script type="text/javascript">
		(function ($) {
			
			$("#birthdate").datepicker({
				dateFormat: 'dd/mm/yy', 
				endDate: '-18y'
			});

			$("#date-registered").datepicker({
				dateFormat: 'dd/mm/yy',
			});

			// $('input[name="contactnumber"]').inputmask("mask", {
	  //           mask: "+63999 999 9999"
	  //           // +63 (XXX) YYY ZZZZ
	  //       })

	        $(document).on('change', 'input[name="birthdate"]', function() {
	        	var bdate = new Date($(this).val());
	        	var today = new Date();
	        	var age = Math.floor((today-bdate) / (365.25 * 24 * 60 * 60 * 1000));
	        	console.info(age)
	        	// if(age){
	        	if(age != NaN){
	        		$('input[name="age"]').val(age)
	        	}
	        	

			});

			$(document).on('click', 'input[type="radio"]',function(){
				var txtname = $(this).attr('id')
				var val = $(this).val()

				$('input[name="'+txtname+'"]').val(val)
				// $($(this).attr('id')).val($(this).val())
			});

			$(document).on('click', '#chck-illness', function(){
				console.info()
				if($(this).prop("checked")){
					$('#other-illness').focus()
				}else{
					$('#other-illness').focusout()
					$('#other-illness').val('')
				}
			})
		})(jQuery);
	</script>

	</body>
</html>
