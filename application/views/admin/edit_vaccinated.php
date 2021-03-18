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
								<form id="update-vaccinated-form"  action="<?php echo base_url() ?>vaccinated/update/<?php echo $vaccinated['vaccinated_id']; ?>" method="post"  enctype="multipart/form-data">
									<div class="card card-custom gutter-b">
										
										<div class="card-body">  
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Person Name<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="hidden" value="<?php echo $vaccinated['record_id'] ?>" name="id" name="id" />
													<input class="form-control input-sm" value="<?php echo ucwords( $vaccinated['firstname'] . ' ' . $vaccinated['middlename'] . ' ' . $vaccinated['lastname'] )?>" id="search-person" type="text" name="person_name" placeholder="Person Name" autocomplete="off" autofocus="" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Dose<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<select  class="form-control input-sm" name="dose">
														<option value="">Select</option>
														<option value="1st Dose" <?php echo $vaccinated['dose'] == "1st Dose" ? 'selected' : '' ?> >1st Dose</option>
														<option value="2nd Dose" <?php echo $vaccinated['dose'] == "2nd Dose" ? 'selected' : '' ?> >2nd Dose</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Batch #<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="text"  value="<?php echo $vaccinated['batch_number'] ?>" name="batch_number" placeholder="Batch #" autocomplete="off" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Date Given<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-8">
													<input class="form-control input-sm" type="date" value="<?php echo $vaccinated['date_given'] ?>" name="date_given" placeholder="Date Given" autocomplete="off" />
												</div>
											</div>
										</div>
										<div class="card-footer">
											<div class="text-right">
												<a href="<?php echo base_url(); ?>vaccinated" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Back</a>
												<button type="button" id="update-vaccinated-btn" class="btn btn-primary"> <i class="fas fa-save"></i> Update</button>
												
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

	<script src="<?php echo base_url(); ?>dist/assets/js/edit_vaccinated.js"></script> 
	<script type="text/javascript">
		(function ($) {

			$("#birthdate").datepicker({
				dateFormat: 'dd/mm/yy', 
				endDate: '-18y'
			});

			$('input[name="contactnumber"]').inputmask("mask", {
	            mask: "+63999 999 9999"
	            // +63 (XXX) YYY ZZZZ
	        })

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