<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->view('template/meta-info.php'); ?>
		<?php $this->view('template/css-link.php'); ?>
		<style type="text/css" media="print">
			@page {
			    size: auto;   /* auto is the initial value */
			    /*margin: 0; */
			    margin: 10mm 5mm 5mm 5mm; 
		        @include box-shadow(none);
		        @include text-shadow(none);
			}
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
								<div class="card card-custom gutter-b">
									<div class="card-header py-3">
										<div class="card-title">
											<h3 class="card-label"><?php echo $page_title; ?></h3>
										</div>
										<div class="card-toolbar">
											<?php
												if( strtolower( $_SESSION['role_type'] )  == "super admin" || strtolower( $_SESSION['role_type'] )  == "sub admin" ){
											?>
												<a href="<?php echo base_url(); ?>record/add"  class="btn btn-primary font-weight-bolder">
												<span class="svg-icon svg-icon-md"> 
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<circle fill="#000000" cx="9" cy="15" r="6" />
															<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>New Record</a>

											<?php

												}
											?>
										</div>
									</div>
									<div class="card-body">
										<form class="mb-15">
											<div class="form-group row justify-content-center">
												<div class="col-6 col-sm-6  col-md-6  col-lg-6 col-xl-6">
													<label><strong>Date Range</strong></label>
													<div class="input-daterange input-group" id="date-range">
														<input type="text" class="form-control datatable-input"
															name="date-range-start" autocomplete="off" placeholder="From" required="" />
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-ellipsis-h"></i>
															</span>
														</div>
														<input type="text" class="form-control datatable-input"
															name="date-range-end" autocomplete="off"  placeholder="To"  required="" />
														 
													</div>
												</div>
												
											</div>
											<div class="form-group row">
												<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
													<label>Purok </label>
													<select required="" class="form-control datatable-input" data-col-index="11">
														<option value="">Select</option>
													</select>
												</div>
												<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
													<label>Street </label>
													<select required="" class="form-control datatable-input" data-col-index="12">
														<option value="">Select</option>
													</select>
												</div>
												<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
													<label>Barangay</label>
													<select required="" class="form-control datatable-input" data-col-index="13">
														<option value="">Select</option>
													</select>
												</div>
												<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
													<label>Occupation</label>
													<select required="" class="form-control datatable-input" data-col-index="14">
														<option value="">Select</option>
													</select>
												</div>
												<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
													<label>Gender</label>
													<select required="" class="form-control datatable-input" id="gender" >
														<option value="">Select</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
												<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
													<label>Age</label>
													<div class="input-group">
														<input type="text" class="form-control datatable-input"
															name="start" autocomplete="off" id="min" placeholder="From" required=""  />
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-ellipsis-h"></i>
															</span>
														</div>
														<input type="text" class="form-control datatable-input"
															name="end" autocomplete="off" id="max" placeholder="To"  required=""  />
													</div> 
												</div>
											</div>
											<!-- <div class="form-group row">
												<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
													<label>Age</label>
													<div class="input-daterange input-group">
														<input type="text" class="form-control datatable-input"
															name="start" autocomplete="off" id="min" placeholder="From" required=""  />
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-ellipsis-h"></i>
															</span>
														</div>
														<input type="text" class="form-control datatable-input"
															name="end" autocomplete="off" id="max" placeholder="To"  required=""  />
													</div> 
												</div>
											</div> -->
 
											<div class="row mt-8">
												<div class="col-lg-12">
													<button class="btn btn-primary btn-primary--icon" id="kt_search">
														<span>
															<i class="la la-search"></i>
															<span>Search</span>
														</span>
													</button>&#160;&#160; 
													<button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
														<span>
															<i class="la la-close"></i>
															<span>Reset</span>
														</span>
													</button>
												</div>
											</div>
										</form>
										<table class="table table-striped table-sm  table-bordered table-hover table-checkable cell-border compact stripe nowrap"  id="record-table">
											<thead>
												<tr>
													<th></th>
													<th>Action</th>
													<th>#</th>
													<th>Date Registered</th>
													<th>Last Name</th>
													<th>First Name</th>
													<th>Middle Name</th>
													<th>Birthdate</th>
													<th>Age</th>
													<th>Gender</th>
													<th>Contact #</th>
													<th>Purok</th>
													<th>Street</th>
													<th>Barangay</th>
													<th>Occupation</th>
													<th>Position</th>
												</tr>
											</thead>
										</table> 
									</div> 
								</div> 
							</div> 
						</div>

						<!-- Modal -->
						<div class="modal fade" id="auth-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="auth-delete-form" action="<?php echo base_url() ?>user/auth_delete" method="post">
										<div class="modal-body">
												<label for="">Enter Password</label>
											<div class="input-group">
												<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password" />
												<div class="input-group-append" style="cursor: pointer;" title="Show Password">
													<span class="input-group-text" id="Show Password">
														<i class="far fa-eye-slash show-password"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											<button type="submit" id="auth-delete-btn" class="btn btn-primary">Ok</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $this->view('template/footer.php'); ?>
	
	<?php $this->view('template/quick-panel.php'); ?>
	<?php $this->view('template/js-src.php'); ?>
	
	<script src="<?php echo base_url(); ?>dist/assets/js/record.js"></script> 

	</body>
</html>