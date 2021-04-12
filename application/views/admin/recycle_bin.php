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
											<ul class="nav nav-tabs nav-bold nav-tabs-line">
												<li class="nav-item">
													<a class="nav-link active " data-toggle="tab" href="#pre-registered-tab">Pre Registered</a>
												</li>
												<li class="nav-item">
													<a class="nav-link " data-toggle="tab" href="#user-tab">User</a>
												</li>
												<li class="nav-item">
													<a class="nav-link " data-toggle="tab" href="#vaccination-site-tab">Vaccination Site</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<div class="tab-content">
											<div class="tab-pane fade show active " id="pre-registered-tab" role="tabpanel">
												<table class="table table-striped table-sm  table-bordered table-hover table-checkable cell-border compact stripe nowrap"  id="recycle-bin-record-table">
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
											<div class="tab-pane fade " id="user-tab" role="tabpanel">
												<table class="table table-striped table-sm  table-bordered table-hover table-checkable cell-border compact stripe nowrap"  id="recycle-user-table">
													<thead>
														<tr>
															<th></th>
															<th>Action</th>
															<th>#</th>
															<th>Date Registered</th>
															<th>Last Name</th>
															<th>First Name</th>
															<th>Middle Name</th>
															<th>Username</th>
															<th>Role Type</th>
														</tr>
													</thead>
												</table>
												
											</div>
											<div class="tab-pane fade   " id="vaccination-site-tab" role="tabpanel">
												<table class="table table-striped table-sm  table-bordered table-hover table-checkable cell-border compact stripe nowrap"  id="recycle-vaccination-site-table">
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
							</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	<?php $this->view('template/footer.php'); ?>
	
	<?php $this->view('template/quick-panel.php'); ?>
	<?php $this->view('template/js-src.php'); ?>
	
	<script src="<?php echo base_url(); ?>dist/assets/js/recycle_bin.js"></script> 

	</body>
</html>