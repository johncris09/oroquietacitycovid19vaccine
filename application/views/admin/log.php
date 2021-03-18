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
 
											<div class="row justify-content-center mt-8">
												<div class="col-6">
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
										<table class="table table-striped table-sm  table-bordered table-hover table-checkable cell-border compact stripe nowrap"  id="log-table">
											<thead>
												<tr>
													<th></th>
													<!-- <th>Action</th> -->
													<th>#</th>
													<th>Description</th>
													<th>User</th>
													<th>Date</th>
													<th>Time</th>
												</tr>
											</thead>
										</table> 
									</div> 
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
	
	<script src="<?php echo base_url(); ?>dist/assets/js/log.js"></script> 

	</body>
</html>