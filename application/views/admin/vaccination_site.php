<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->view('template/meta-info.php'); ?>
		<?php $this->view('template/css-link.php'); ?>
		
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
											<a href="<?php echo base_url(); ?>vaccination_site/assign_barangay"  class="btn btn-outline-danger font-weight-bolder mr-2">
											<span class="svg-icon svg-icon-md"> 
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>Assign Barangay</a>
											<a href="<?php echo base_url(); ?>vaccination_site/add"  class="btn btn-primary font-weight-bolder mr-2">
											<span class="svg-icon svg-icon-md"> 
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>New Vaccination Site</a>
										</div>
									</div>
									<div class="card-body">
										<!-- <button>Print me</button> -->
										<table class="table table-striped table-sm table-bordered table-hover table-checkable nowrap"  id="vaccination-site-table">
											<thead>
												<tr>
													<th></th>
													<th>Action</th>
													<th>#</th>
													<th>Vaccination Site</th>
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
	
	<script src="<?php echo base_url(); ?>dist/assets/js/vaccination_site.js"></script> 

	</body>
</html>
